"""
Modul Manajemen Proyek
=====================
Modul ini mendemonstrasikan penerapan prinsip SOLID, dokumentasi menggunakan
Google Style Docstring, serta penggunaan logging sebagai pengganti print().
"""

from abc import ABC, abstractmethod
from dataclasses import dataclass
import json
import logging

# ===================================================
# Konfigurasi Logging
# ===================================================
logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s"
)
logger = logging.getLogger(__name__)


# ===================================================
# --- Model ---
# ===================================================
@dataclass
class Project:
    """
    Merepresentasikan sebuah proyek.

    Args:
        project_id (str): ID unik proyek.
        name (str): Nama proyek.
        team_size (int): Jumlah anggota tim.
        status (str): Status proyek (default: "planning").
    """
    project_id: str
    name: str
    team_size: int
    status: str = "planning"  # planning, in_progress, completed


# ===================================================
# --- Abstraksi (OCP / DIP) ---
# ===================================================
class ReportGenerator(ABC):
    """
    Kontrak untuk semua generator laporan.
    """

    @abstractmethod
    def generate(self, projects: list[Project]) -> str:
        """
        Menghasilkan laporan proyek.

        Args:
            projects (list[Project]): Daftar proyek.

        Returns:
            str: Laporan dalam format tertentu.
        """
        pass


class NotificationService(ABC):
    """
    Kontrak untuk semua layanan notifikasi.
    """

    @abstractmethod
    def send(self, project: Project, message: str) -> None:
        """
        Mengirim notifikasi terkait proyek.

        Args:
            project (Project): Proyek target.
            message (str): Pesan notifikasi.
        """
        pass


# ===================================================
# --- Implementasi Konkret ---
# ===================================================
class JsonReportGenerator(ReportGenerator):
    """
    Generator laporan dalam format JSON.
    """

    def generate(self, projects: list[Project]) -> str:
        logger.info("Memproses laporan dalam format JSON")
        report_data = [
            {"id": p.project_id, "nama": p.name, "status": p.status}
            for p in projects
        ]
        return json.dumps(report_data, indent=4)


class TextReportGenerator(ReportGenerator):
    """
    Generator laporan dalam format teks.
    """

    def generate(self, projects: list[Project]) -> str:
        logger.info("Memproses laporan dalam format TEXT")
        report_data = [
            {"id": p.project_id, "nama": p.name, "status": p.status}
            for p in projects
        ]
        return "\n".join(
            f"- {item['id']} | {item['nama']} ({item['status']})"
            for item in report_data
        )


class EmailNotificationService(NotificationService):
    """
    Layanan notifikasi melalui email.
    """

    def send(self, project: Project, message: str) -> None:
        logger.info(
            "Mengirim email ke proyek '%s' dengan pesan: %s",
            project.name,
            message,
        )
        # Simulasi pengiriman email


# ===================================================
# --- Kelas Koordinator ---
# ===================================================
class ProjectCoordinator:
    """
    Koordinator utama manajemen proyek.

    Menggunakan Dependency Injection untuk layanan notifikasi
    dan generator laporan.
    """

    def __init__(self, notif_service: NotificationService, report_gen: ReportGenerator):
        """
        Inisialisasi coordinator.

        Args:
            notif_service (NotificationService): Layanan notifikasi.
            report_gen (ReportGenerator): Generator laporan.
        """
        self._notifier = notif_service
        self._reporter = report_gen

    def start_project(self, project: Project) -> bool:
        """
        Memulai sebuah proyek.

        Args:
            project (Project): Proyek yang akan dimulai.

        Returns:
            bool: True jika berhasil, False jika proyek sudah berjalan.
        """
        if project.status == "in_progress":
            logger.warning("Proyek %s sudah berjalan", project.name)
            return False

        logger.info("[%s] Memulai proyek '%s'", project.project_id, project.name)
        project.status = "in_progress"
        self._notifier.send(project, f"Proyek '{project.name}' telah DIMULAI")
        return True

    def generate_project_report(self, projects: list[Project]) -> str:
        """
        Menghasilkan laporan proyek.

        Args:
            projects (list[Project]): Daftar proyek.

        Returns:
            str: Laporan proyek.
        """
        logger.info("Meminta laporan dari generator")
        return self._reporter.generate(projects)


# ===================================================
# --- Contoh Penggunaan ---
# ===================================================
if __name__ == "__main__":
    project_x = Project("P003", "Implementasi SSO", 8)
    project_y = Project("P004", "Migrasi Database", 4)

    email_notif = EmailNotificationService()
    json_report = JsonReportGenerator()
    text_report = TextReportGenerator()

    coordinator_a = ProjectCoordinator(email_notif, json_report)
    coordinator_a.start_project(project_x)
    print(coordinator_a.generate_project_report([project_x, project_y]))

    coordinator_b = ProjectCoordinator(email_notif, text_report)
    coordinator_b.start_project(project_y)
    print(coordinator_b.generate_project_report([project_x, project_y]))