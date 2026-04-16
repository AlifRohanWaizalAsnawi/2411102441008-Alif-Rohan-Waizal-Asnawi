# buah.py

class FruitInventory:
    def __init__(self):
        self.fruits = []

    def add_fruit(self, name, price, stock):
        fruit = {
            "name": name, 
            "price": price, 
            "stock": stock
        }
        self.fruits.append(fruit)

    def calculate_total_asset_value(self, fruit):
        return fruit["price"] * fruit["stock"]

def display_inventory_report(inventory):
    print("=== LAPORAN STOK BUAH ===")
    for fruit in inventory.fruits:
        total_value = inventory.calculate_total_asset_value(fruit)
        print(f"Buah: {fruit['name']:<10} | Nilai Aset: Rp{total_value:,}")

def main():
    inventory = FruitInventory()
    
    inventory.add_fruit("Apel", 5000, 10)
    inventory.add_fruit("Mangga", 8000, 5)
    
    display_inventory_report(inventory)

if __name__ == "__main__":
    main()