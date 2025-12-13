import logging
from abc import ABC, abstractmethod

# ==============================================================================
# 1. IMPLEMENTASI LOGGING
# (Mengganti semua print() dengan logging.INFO/WARNING)
# ==============================================================================

# Konfigurasi dasar logging
logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(levelname)s - %(name)s - %(message)s',
    datefmt='%Y-%m-%d %H:%M:%S'
)
service_logger = logging.getLogger('RegistrationService')
rule_logger = logging.getLogger('ValidationRule')

# ==============================================================================
# 2. IMPLEMENTASI DOCSTRING (Google Style) PADA INTERFACE
# ==============================================================================

class IValidationRule(ABC):
    """Antarmuka (Abstract Base Class) untuk semua aturan validasi pendaftaran mahasiswa.

    Setiap aturan validasi spesifik harus mengimplementasikan antarmuka ini 
    (Prinsip Liskov Substitution dan Dependency Inversion).
    """
    
    @abstractmethod
    def validate(self, student_data: dict, course_data: dict) -> bool:
        """Melakukan validasi spesifik terhadap data pendaftaran.

        Args:
            student_data: Data profil mahasiswa (misalnya, IPK, semester).
            course_data: Data kursus yang didaftarkan (misalnya, SKS, prasyarat).

        Returns:
            bool: True jika validasi berhasil (aturan lolos), False jika gagal.
        """
        pass

# ==============================================================================
# 3. IMPLEMENTASI DOCSTRING & LOGGING PADA CONCRETE RULES
# ==============================================================================

class SksLimitRule(IValidationRule):
    """Aturan validasi yang memastikan total SKS yang didaftarkan tidak melebihi batas.
    
    (Mewakili salah satu implementasi dari Prinsip Single Responsibility).
    """
    def __init__(self, max_sks: int):
        """Menginisialisasi aturan dengan batas SKS maksimum.

        Args:
            max_sks: Jumlah maksimum SKS yang diizinkan untuk didaftarkan.
        """
        self.max_sks = max_sks

    def validate(self, student_data: dict, course_data: dict) -> bool:
        """Memvalidasi apakah total SKS pendaftaran berada dalam batas yang diizinkan.

        Args:
            student_data: Data profil mahasiswa.
            course_data: Data kursus yang didaftarkan.

        Returns:
            bool: True jika total SKS <= max_sks, False jika melebihi batas.
        """
        total_sks = course_data.get('total_sks', 0)
        
        if total_sks > self.max_sks:
            # Ganti print() dengan logging.WARNING
            rule_logger.warning(
                f"SksLimitRule GAGAL: Batas SKS ({self.max_sks}) terlampaui oleh {total_sks} SKS."
            )
            return False
        
        # Ganti print() dengan logging.INFO
        rule_logger.info(
            f"SksLimitRule BERHASIL: Total SKS ({total_sks}) berada dalam batas."
        )
        return True

class MinimumGPARule(IValidationRule):
    """Aturan yang memastikan mahasiswa memiliki IPK minimum untuk mendaftar lebih dari 20 SKS."""
    
    def __init__(self, min_gpa: float, sks_threshold: int):
        """Menginisialisasi aturan dengan IPK minimum dan batas SKS pemicu.

        Args:
            min_gpa: IPK minimum yang disyaratkan.
            sks_threshold: Batas SKS yang jika dilewati akan memicu pemeriksaan IPK.
        """
        self.min_gpa = min_gpa
        self.sks_threshold = sks_threshold

    def validate(self, student_data: dict, course_data: dict) -> bool:
        """Memvalidasi IPK jika SKS melebihi batas.

        Args:
            student_data: Data profil mahasiswa (harus berisi 'ipk').
            course_data: Data kursus yang didaftarkan (harus berisi 'total_sks').

        Returns:
            bool: True jika validasi lolos atau tidak berlaku, False jika gagal.
        """
        ipk = student_data.get('ipk', 0.0)
        total_sks = course_data.get('total_sks', 0)
        
        if total_sks > self.sks_threshold and ipk < self.min_gpa:
            rule_logger.warning(
                f"MinimumGPARule GAGAL: IPK ({ipk}) di bawah minimum ({self.min_gpa}) untuk mendaftar {total_sks} SKS."
            )
            return False
        
        rule_logger.info(
            f"MinimumGPARule BERHASIL: Mahasiswa memenuhi syarat IPK atau SKS tidak memicu pemeriksaan."
        )
        return True


# ==============================================================================
# 4. IMPLEMENTASI DOCSTRING & LOGGING PADA REGISTRATION SERVICE
# ==============================================================================

class RegistrationService:
    """Layanan yang bertanggung jawab untuk mengelola proses pendaftaran mahasiswa.

    Layanan ini mengorkestrasi pelaksanaan semua aturan validasi yang diberikan
    (Prinsip Open/Closed dan Single Responsibility).
    """
    def __init__(self, rules: list[IValidationRule]):
        """Menginisialisasi layanan dengan daftar aturan validasi.

        Args:
            rules: Daftar objek yang mengimplementasikan IValidationRule.
        """
        self.rules = rules

    def register_student(self, student_data: dict, course_data: dict) -> bool:
        """Mencoba mendaftarkan mahasiswa setelah melewati semua aturan validasi.

        Args:
            student_data: Data profil mahasiswa.
            course_data: Data kursus yang didaftarkan.

        Returns:
            bool: True jika pendaftaran berhasil (semua aturan lolos), False jika gagal.
        """
        student_id = student_data.get('id', 'N/A')
        service_logger.info(f"Memulai pendaftaran untuk Mahasiswa ID: {student_id}")

        for rule in self.rules:
            rule_name = type(rule).__name__
            service_logger.info(f"-> Menjalankan Aturan: {rule_name}")

            if not rule.validate(student_data, course_data):
                # Ganti print() dengan logging.WARNING
                service_logger.warning(
                    f"Pendaftaran DIBATALKAN untuk Mahasiswa ID {student_id} karena gagal pada aturan: {rule_name}"
                )
                return False

        # Ganti print() dengan logging.INFO
        service_logger.info(
            f"Pendaftaran BERHASIL untuk Mahasiswa ID: {student_id}. Semua validasi lolos."
        )
        # Logika pendaftaran final (misalnya, menyimpan ke database) akan diletakkan di sini.
        return True

# ==============================================================================
# CONTOH PENGGUNAAN
# ==============================================================================

if __name__ == '__main__':
    # 1. Definisikan Aturan
    rules = [
        SksLimitRule(max_sks=24),        # Batas SKS maksimal 24
        MinimumGPARule(min_gpa=3.0, sks_threshold=20) # IPK min 3.0 jika daftar > 20 SKS
    ]

    # 2. Buat Layanan
    reg_service = RegistrationService(rules)

    # Contoh Mahasiswa A: Gagal (SKS terlalu banyak)
    student_a = {'id': 'MHS001', 'ipk': 3.5}
    course_a = {'total_sks': 25}
    service_logger.info("\n--- CONTOH 1: Pendaftaran Gagal (SKS Limit) ---")
    reg_service.register_student(student_a, course_a)
    
    # Contoh Mahasiswa B: Gagal (IPK kurang dari 3.0 saat SKS > 20)
    student_b = {'id': 'MHS002', 'ipk': 2.8}
    course_b = {'total_sks': 22}
    service_logger.info("\n--- CONTOH 2: Pendaftaran Gagal (IPK Rendah) ---")
    reg_service.register_student(student_b, course_b)

    # Contoh Mahasiswa C: Berhasil
    student_c = {'id': 'MHS003', 'ipk': 3.8}
    course_c = {'total_sks': 23}
    service_logger.info("\n--- CONTOH 3: Pendaftaran Berhasil ---")
    reg_service.register_student(student_c, course_c)