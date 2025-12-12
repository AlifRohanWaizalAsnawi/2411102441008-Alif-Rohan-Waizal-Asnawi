from abc import ABC, abstractmethod
from dataclasses import dataclass
import json

# --- Model Sederhana (diambil dari kode sebelumnya) ---
@dataclass
class Project:
    project_id: str
    name: str
    team_size: int
    status: str = "planning" # "planning", "in_progress", "completed"

# ===================================================
# --- ABSTRAKSI (Kontrak untuk OCP/DIP) ---
# ===================================================

class ReportGenerator(ABC):
    """Kontrak: Semua generator laporan harus punya method 'generate'."""
    @abstractmethod
    def generate(self, projects: list[Project]) -> str:
        pass

class NotificationService(ABC):
    """Kontrak: Semua layanan notifikasi harus punya method 'send'."""
    @abstractmethod
    def send(self, project: Project, message: str) -> None:
        pass

# ===================================================
# --- IMPLEMENTASI KONKRET (Plug-in) ---
# ===================================================

class JsonReportGenerator(ReportGenerator):
    """Implementasi konkret untuk laporan JSON."""
    def generate(self, projects: list[Project]) -> str:
        print("-> [JsonReportGenerator]: Memproses laporan dalam format JSON.")
        report_data = [{"id": p.project_id, "nama": p.name, "status": p.status} for p in projects]
        return json.dumps(report_data, indent=4)

class TextReportGenerator(ReportGenerator):
    """Implementasi konkret untuk laporan TEXT."""
    def generate(self, projects: list[Project]) -> str:
        print("-> [TextReportGenerator]: Memproses laporan dalam format TEXT.")
        report_data = [{"id": p.project_id, "nama": p.name, "status": p.status} for p in projects]
        text_report = "\n".join([f"  - {item['id']} | {item['nama']} ({item['status']})" for item in report_data])
        return text_report

class EmailNotificationService(NotificationService):
    """Implementasi konkret untuk pengiriman notifikasi via Email."""
    def send(self, project: Project, message: str) -> None:
        print(f"-> [EmailNotificationService]: Mengirim email ke tim proyek '{project.name}'. Pesan: '{message}'")
        # Logika pengiriman email ada di sini
        pass

# ===================================================
# --- KELAS KOORDINATOR (Menggunakan SRP & DIP) ---
# ===================================================

class ProjectCoordinator:
    """
    Kelas penanggung jawab tunggal untuk manajemen proyek. 
    Menggunakan Dependency Injection (DIP) untuk layanan plug-in.
    """
    def __init__(self, notif_service: NotificationService, report_gen: ReportGenerator):
        # Dependency Injection (DI): menyuntikkan (inject) objek konkret melalui abstraksi
        self._notifier = notif_service
        self._reporter = report_gen

    def start_project(self, project: Project) -> bool:
        """Logika manajemen proyek: memulai."""
        if project.status == "in_progress":
            print(f"Proyek {project.name} sudah berjalan.")
            return False
            
        print(f"[{project.project_id}] Memulai proyek '{project.name}'...")
        project.status = "in_progress"
        
        # Delegasi: Tanggung jawab notifikasi diserahkan ke _notifier
        message = f"Proyek '{project.name}' telah resmi **DIMULAI**."
        self._notifier.send(project, message)
        
        return True

    def generate_project_report(self, projects: list[Project]) -> str:
        """Logika manajemen proyek: menghasilkan laporan."""
        print("\n[ProjectCoordinator]: Meminta laporan dari generator yang disuntikkan...")
        # Delegasi: Tanggung jawab pelaporan diserahkan ke _reporter
        return self._reporter.generate(projects)

# ===================================================
# --- Contoh Penggunaan ---
# ===================================================

if __name__ == "__main__":
    
    # 1. Inisialisasi Proyek
    project_x = Project(project_id="P003", name="Implementasi SSO", team_size=8)
    project_y = Project(project_id="P004", name="Migrasi Database", team_size=4)
    all_projects = [project_x, project_y]

    # 2. Inisialisasi Layanan Konkret (Plug-in)
    email_notif = EmailNotificationService()
    json_report = JsonReportGenerator()
    text_report = TextReportGenerator()
    
    # 3. Inisialisasi Koordinator dengan Dependency Injection
    # Kita menggunakan EmailNotifier dan JsonReportGenerator untuk Koordinator A
    coordinator_a = ProjectCoordinator(
        notif_service=email_notif, 
        report_gen=json_report
    )

    print("\n--- Aksi Koordinator A (Menggunakan JSON Report) ---")
    coordinator_a.start_project(project_x)
    
    # Menghasilkan laporan menggunakan JsonReportGenerator
    json_output = coordinator_a.generate_project_report(all_projects)
    print(json_output)

    # 4. Inisialisasi Koordinator B (Demonstrasi OCP/DIP)
    # Kita bisa dengan mudah mengganti plug-in pelaporan tanpa mengubah ProjectCoordinator!
    coordinator_b = ProjectCoordinator(
        notif_service=email_notif, 
        report_gen=text_report # Mengganti generator ke TEXT
    )
    
    print("\n--- Aksi Koordinator B (Menggunakan TEXT Report) ---")
    coordinator_b.start_project(project_y)

    # Menghasilkan laporan menggunakan TextReportGenerator
    text_output = coordinator_b.generate_project_report(all_projects)
    print(text_output)