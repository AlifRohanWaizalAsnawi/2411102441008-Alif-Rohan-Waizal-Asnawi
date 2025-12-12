from abc import ABC, abstractmethod
from typing import Protocol, runtime_checkable # Menggunakan Protocol untuk opsi modern
from project_model import Project # Import Model Data yang dibutuhkan dalam kontrak

# ===================================================
# --- ABSTRAKSI (Kontrak untuk OCP/DIP) ---
# Menggunakan ABC/abstractmethod (Cara tradisional Python)
# ===================================================

class ReportGenerator(ABC):
    """
    Kontrak (Abstraksi): Semua generator laporan harus punya method 'generate'.
    Ini adalah antarmuka tingkat tinggi (Prinsip DIP).
    """
    @abstractmethod
    def generate(self, projects: list[Project]) -> str:
        """Metode untuk menghasilkan output laporan."""
        pass

class NotificationService(ABC):
    """
    Kontrak (Abstraksi): Semua layanan notifikasi harus punya method 'send'.
    """
    @abstractmethod
    def send(self, project: Project, message: str) -> None:
        """Metode untuk mengirim notifikasi kepada tim proyek."""
        pass