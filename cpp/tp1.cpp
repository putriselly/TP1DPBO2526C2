#include <iostream>
#include <vector>
#include <string>

using namespace std;

class Bioskop {
private:
    string idBioskop;
    string popcorn;
    string softdrink;
    string waktuBuka;

public:
    // constructor
    Bioskop(string IdBioskop, string popcorn, string softdrink, string waktuBuka) {
        this->idBioskop = IdBioskop;
        this->popcorn = popcorn;
        this->softdrink = softdrink;
        this->waktuBuka = waktuBuka;
    }

    // getter
    string getIdBioskop() {
        return this->idBioskop;
    }

    string getPopcorn() {
        return this->popcorn;
    }

    string getSoftdrink() {
        return this->softdrink;
    }

    string getWaktuBuka() {
        return this->waktuBuka;
    }

    // setter
    void setIdBioskop(string idbioskop) {
        this->idBioskop = idbioskop;
    }

    void setPopcorn(string popcorn) {
        this->popcorn = popcorn;
    }

    void setSoftdrink(string softdrink) {
        this->softdrink = softdrink;
    }

    void setWaktubuka(string waktubuka) {
        this->waktuBuka = waktubuka;
    }
};

int main() {
    // list daftar objek bioskop
    vector<Bioskop> daftarBioskop;

    // buat 3 object bioskop
    Bioskop bioskop1("001", "Popcorn Balado", "Milo", "8.00");
    daftarBioskop.push_back(bioskop1);
    Bioskop bioskop2("002", "Popcorn Caramel", "Coca-Cola", "12.00");
    daftarBioskop.push_back(bioskop2);
    Bioskop bioskop3("003", "Popcorn Original", "Fanta", "9.00");
    daftarBioskop.push_back(bioskop3);

    // tambah data bioskop
    cout << "**** TAMBAH DATA BIOSKOP ****" << endl;
    string idBaru;
    string popcornBaru;
    string softdrinkBaru;
    string waktuBukaBaru;
    cout << "Masukkan ID Bioskop: ";
    cin >> idBaru;
    cout << "Masukkan Rasa Popcorn: ";
    cin.ignore();
    getline(cin, popcornBaru);
    cout << "Masukkan Jenis Soft Drink: ";
    getline(cin, softdrinkBaru);
    cout << "Masukkan Waktu Buka: ";
    getline(cin, waktuBukaBaru);
    Bioskop bioskopBaru(idBaru, popcornBaru, softdrinkBaru, waktuBukaBaru);
    daftarBioskop.push_back(bioskopBaru);
    cout << "Data berhasil ditambahkan" << endl;
    cout << endl;

    // cari bioskop dengan id
    string cariBioskop;
    cout << "Masukkan ID Bioskop yang dicari: ";
    cin >> cariBioskop;
    cout << "**** CARI BIOSKOP ****" << endl;
    bool dataDitemukan = false;
    for (Bioskop &bioskop : daftarBioskop) {
        if (bioskop.getIdBioskop() == cariBioskop) {
            cout << "Data ketemu!" << endl;
            cout << "Id Bioskop: " << bioskop.getIdBioskop()
                 << " Rasa Popcorn: " << bioskop.getPopcorn()
                 << " Jenis Soft Drink: " << bioskop.getSoftdrink()
                 << " Jam Buka: " << bioskop.getWaktuBuka()
                 << endl;
            dataDitemukan = true;
            break;
        }
    }
    if (dataDitemukan == false) {
        cout << "Data tidak ditemukan" << endl;
    }
    cout << endl;
    // tampilan bioskop sebelum ada hapus data
    cout << "**** DAFTAR BIOSKOP ****" << endl;
    for (Bioskop &bioskop : daftarBioskop) {
        cout << "Id Bioskop: " << bioskop.getIdBioskop()
             << " Rasa Popcorn: " << bioskop.getPopcorn()
             << " Jenis Soft Drink: " << bioskop.getSoftdrink()
             << " Jam Buka: " << bioskop.getWaktuBuka()
             << endl;
        cout << endl;
    }

    // hapus bioskop dengan id bioskop
    string idHapus;
    cout << "Masukkan ID Bioskop yang ingin dihapus: ";
    cin >> idHapus;
    cout << "**** HAPUS BIOSKOP ****" << endl;
    dataDitemukan = false;
    for (int i = 0; i < daftarBioskop.size(); i++) {
        if (daftarBioskop[i].getIdBioskop() == idHapus) {
            daftarBioskop.erase(daftarBioskop.begin() + i);
            cout << "Data berhasil dihapus" << endl;
            dataDitemukan = true;
            break;
        }
    }
    if (dataDitemukan == false) {
        cout << "Data tidak ditemukan" << endl;
    }
    cout << endl;

    // daftar bioskop setelah ada data yang dihapus
    cout << "**** DAFTAR BIOSKOP SETELAH ADA YANG DIHAPUS ****" << endl;
    for (Bioskop &bioskop : daftarBioskop) {
        cout << "Id Bioskop: " << bioskop.getIdBioskop()
             << " Rasa Popcorn: " << bioskop.getPopcorn()
             << " Jenis Soft Drink: " << bioskop.getSoftdrink()
             << " Jam Buka: " << bioskop.getWaktuBuka()
             << endl;
        cout << endl;
    }

    // ubah data
    string idCari;
    cout << "Masukkan ID Bioskop yang ingin diubah: ";
    cin >> idCari;
    cout << "**** UPDATE DATA BIOSKOP ****" << endl;
    dataDitemukan = false;
    for (Bioskop &bioskop : daftarBioskop) {
        if (bioskop.getIdBioskop() == idCari) {
            cout << "Masukkan Rasa Popcorn Baru: ";
            cin.ignore();
            getline(cin, popcornBaru);
            cout << "Masukkan Jenis Soft Drink Baru: ";
            getline(cin, softdrinkBaru);
            cout << "Masukkan Waktu Buka Baru: ";
            getline(cin, waktuBukaBaru);
            bioskop.setPopcorn(popcornBaru);
            bioskop.setSoftdrink(softdrinkBaru);
            bioskop.setWaktubuka(waktuBukaBaru);
            cout << "Data berhasil diupdate" << endl;
            dataDitemukan = true;
            break;
        }
    }
    if (dataDitemukan == false) {
        cout << "Data tidak ditemukan" << endl;
    }
    return 0;
}