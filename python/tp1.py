class Bioskop:
    def __init__(self, IdBioskop, popcorn, softdrink, waktuBuka):
        self.__idBioskop = IdBioskop
        self.__popcorn = popcorn
        self.__softdrink = softdrink
        self.__waktubuka = waktuBuka

    # getter
    def getIdBioskop(self):
        return self.__idBioskop
    def getPopcorn(self):
        return self.__popcorn
    def getSoftdrink(self):
        return self.__softdrink
    def getWaktuBuka(self):
        return self.__waktubuka

    # setter
    def setIdBioskop(self, idbioskop):
        self.__idBioskop = idbioskop
    def setPopcorn(self, popcorn):
        self.__popcorn = popcorn
    def setSoftdrink(self, softdrink):
        self.__softdrink = softdrink
    def setWaktubuka(self, waktubuka):
        self.__waktubuka = waktubuka

# list daftar objek bioskop
daftarBioskop = []

# buat 3 object bioskop
bioskop1 = Bioskop("001", "Popcorn Balado", "Milo", "8.00")
daftarBioskop.append(bioskop1)

bioskop2 = Bioskop("002", "Popcorn Caramel", "Coca-Cola", "12.00")
daftarBioskop.append(bioskop2)

bioskop3 = Bioskop("003", "Popcorn Original", "Fanta", "9.00")
daftarBioskop.append(bioskop3)

# tambah data bioskop
print("**** TAMBAH DATA BIOSKOP ****")
idBaru = input("Masukkan ID Bioskop: ")
popcornBaru = input("Masukkan Rasa Popcorn: ")
softdrinkBaru = input("Masukkan Jenis Soft Drink: ")
waktuBukaBaru = input("Masukkan Waktu Buka: ")
bioskopBaru = Bioskop(idBaru, popcornBaru, softdrinkBaru, waktuBukaBaru)
daftarBioskop.append(bioskopBaru)
print("Data berhasil ditambahkan")
print()

# cari bioskop dengan id
cariBioskop = input("Masukkan ID Bioskop yang dicari: ")
print("**** CARI BIOSKOP ****")
dataDitemukan = False
for bioskop in daftarBioskop:
    if bioskop.getIdBioskop() == cariBioskop:
        print("Data ketemu!")
        print(f"Id Bioskop: {bioskop.getIdBioskop()} Rasa Popcorn: {bioskop.getPopcorn()} Jenis Soft Drink: {bioskop.getSoftdrink()} Jam Buka: {bioskop.getWaktuBuka()}")
        dataDitemukan = True
        break
if dataDitemukan == False:
    print("Data tidak ditemukan")
print()

# tampilan bioskop sebelum ada hapus data
print("**** DAFTAR BIOSKOP ****")
for bioskop in daftarBioskop:
    print(f"Id Bioskop: {bioskop.getIdBioskop()} Rasa Popcorn: {bioskop.getPopcorn()} Jenis Soft Drink: {bioskop.getSoftdrink()} Jam Buka: {bioskop.getWaktuBuka()}")
    print()

# hapus bioskop dengan id bioskop
idHapus = input("Masukkan ID Bioskop yang ingin dihapus: ")
print("**** HAPUS BIOSKOP ****")
dataDitemukan = False
for bioskop in daftarBioskop:
    if bioskop.getIdBioskop() == idHapus:
        daftarBioskop.remove(bioskop)
        print("Data berhasil dihapus")
        dataDitemukan = True
        break
if dataDitemukan == False:
    print("Data tidak ditemukan")
print()

# daftar bioskop setelah ada data yang dihapus
print("**** DAFTAR BIOSKOP SETELAH ADA YANG DIHAPUS ****")
for bioskop in daftarBioskop:
    print(f"Id Bioskop: {bioskop.getIdBioskop()} Rasa Popcorn: {bioskop.getPopcorn()} Jenis Soft Drink: {bioskop.getSoftdrink()} Jam Buka: {bioskop.getWaktuBuka()}")
    print()

# ubah data
idCari = input("Masukkan ID Bioskop yang ingin diubah: ")
print("**** UPDATE DATA BIOSKOP ****")
dataDitemukan = False
for bioskop in daftarBioskop:
    if bioskop.getIdBioskop() == idCari:
        popcornBaru = input("Masukkan Rasa Popcorn Baru: ")
        softdrinkBaru = input("Masukkan Jenis Soft Drink Baru: ")
        waktuBukaBaru = input("Masukkan Waktu Buka Baru: ")
        bioskop.setPopcorn(popcornBaru)
        bioskop.setSoftdrink(softdrinkBaru)
        bioskop.setWaktubuka(waktuBukaBaru)
        print("Data berhasil diupdate")
        dataDitemukan = True
        break
if dataDitemukan == False:
    print("Data tidak ditemukan")