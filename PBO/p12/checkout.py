import logging
from typing import Any # Menggunakan Any untuk dependensi yang tidak terdefinisi secara penuh

# ==============================================================================
# LANGKAH 2: IMPLEMENTASI LOGGING (DI start.py/Konfigurasi Awal)
# ==============================================================================

# Konfigurasi dasar: Semua log level INFO ke atas akan ditampilkan.
logging.basicConfig(
    # Atur level log minimal yang akan diproses
    level=logging.INFO,
    # Format log: waktu - level - nama logger - pesan
    format='%(asctime)s - %(levelname)s - %(name)s - %(message)s',
    # Format tanggal/waktu yang lebih mudah dibaca
    datefmt='%Y-%m-%d %H:%M:%S'
)
# Tambahkan logger untuk kelas Checkout yang akan kita gunakan
checkout_logger = logging.getLogger('Checkout')


# ==============================================================================
# KELAS CHECKOUT DENGAN DOCSTRING (Google Style) DAN PERUBAHAN LOGGING
# ==============================================================================

class Checkout(object):
    """Inti dari simulasi pengeluaran dan notifikasi (sementara 'ARP')."""

    def __init__(self, init_url: str, payment_processor: Any, payment_history: Any, notifier: Any):
        """Menginisialisasi objek/entitas dengan dependensi yang diperlukan.

        Args:
            init_url: URL awal untuk inisialisasi (jika diperlukan).
            payment_processor: [PaymentProcessor] Memproses/otorisasi pembayaran.
            payment_history: [PaymentHistory] Mencatat transaksi yang terjadi.
            notifier: [Notifier] Mengirim notifikasi.
        """
        self.init_url = init_url
        self.payment_processor = payment_processor
        self.payment_history = payment_history
        self.notifier = notifier
        
    def run_checkout(self, order_id: str, order_total: float) -> dict:
        """Menjalankan proses checkout untuk order yang spesifik.
        (Perubahan: Ganti print() dengan fungsi logger)

        Args:
            order_id: ID unik dari pesanan.
            order_total: Jumlah total pembayaran.

        Returns:
            dict: Detail hasil pembayaran, jika sukses atau gagal.
        """
        # Menggantikan print() dengan logging.info()
        checkout_logger.info(f'Memulai proses checkout untuk order {order_id} total {order_total}.')

        try:
            # 1. Proses pembayaran
            payment_success = self.payment_processor.process_payment(order_id, order_total)

            if payment_success:
                # Menggantikan print() dengan logging.info()
                checkout_logger.info(f'Pembayaran sukses untuk order {order_id}.')
                
                # 2. Catat dan Notifikasi Sukses
                self.payment_history.record_success(order_id, order_total)
                self.notifier.notify_success(order_id)
                checkout_logger.debug(f'Mencatat riwayat dan mengirim notifikasi sukses untuk {order_id}.')
                
                return {"status": "SUCCESS", "order_id": order_id}
            else:
                # Menggantikan print() dengan logging.warning()
                checkout_logger.warning(f'Pembayaran gagal untuk order {order_id}.')
                
                # 2. Catat dan Notifikasi Kegagalan
                self.payment_history.record_failure(order_id, order_total)
                self.notifier.notify_failure(order_id)
                checkout_logger.debug(f'Mencatat kegagalan dan mengirim notifikasi gagal untuk {order_id}.')
                
                return {"status": "FAILURE", "order_id": order_id}

        except Exception as e:
            # Penanganan error tak terduga dengan logging.error()
            checkout_logger.error(f'Terjadi error tak terduga saat memproses order {order_id}: {e}', exc_info=True)
            self.notifier.notify_error(order_id, str(e))
            return {"status": "ERROR", "order_id": order_id, "error": str(e)}