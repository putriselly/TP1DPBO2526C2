import java.util.ArrayList;
import java.util.Scanner;

class Bioskop {

    private String idBioskop;
    private String popcorn;
    private String softdrink;
    private String waktuBuka;

    // constructor
    public Bioskop(String IdBioskop, String popcorn, String softdrink, String waktuBuka) {
        this.idBioskop = IdBioskop;
        this.popcorn = popcorn;
        this.softdrink = softdrink;
        this.waktuBuka = waktuBuka;
    }

    // getter
    public String getIdBioskop() {
        return idBioskop;
    }

    public String getPopcorn() {
        return popcorn;
    }

    public String getSoftdrink() {
        return softdrink;
    }

    public String getWaktuBuka() {
        return waktuBuka;
    }

    // setter
    public void setIdBioskop(String idbioskop) {
        this.idBioskop = idbioskop;
    }

    public void setPopcorn(String popcorn) {
        this.popcorn = popcorn;
    }

    public void setSoftdrink(String softdrink) {
        this.softdrink = softdrink;
    }

    public void setWaktubuka(String waktubuka) {
        this.waktuBuka = waktubuka;
    }
}


public class tp1 {

    public static void main(String[] args) {

        Scanner input = new Scanner(System.in);

        // list daftar objek bioskop
        ArrayList<Bioskop> daftarBioskop = new ArrayList<>();

        // buat 3 object bioskop
        Bioskop bioskop1 = new Bioskop(
            "001", "Popcorn Balado", "Milo", "8.00"
        );
        daftarBioskop.add(bioskop1);

        Bioskop bioskop2 = new Bioskop(
            "002", "Popcorn Caramel", "Coca-Cola", "12.00"
        );
        daftarBioskop.add(bioskop2);

        Bioskop bioskop3 = new Bioskop(
            "003", "Popcorn Original", "Fanta", "9.00"
        );
        daftarBioskop.add(bioskop3);


        // tambah data bioskop
        System.out.println("**** TAMBAH DATA BIOSKOP ****");

        System.out.print("Masukkan ID Bioskop: ");
        String idBaru = input.nextLine();

        System.out.print("Masukkan Rasa Popcorn: ");
        String popcornBaru = input.nextLine();

        System.out.print("Masukkan Jenis Soft Drink: ");
        String softdrinkBaru = input.nextLine();

        System.out.print("Masukkan Waktu Buka: ");
        String waktuBukaBaru = input.nextLine();

        Bioskop bioskopBaru = new Bioskop(
            idBaru,
            popcornBaru,
            softdrinkBaru,
            waktuBukaBaru
        );

        daftarBioskop.add(bioskopBaru);

        System.out.println("Data berhasil ditambahkan");
        System.out.println();


        // cari bioskop dengan id
        System.out.print("Masukkan ID Bioskop yang dicari: ");
        String cariBioskop = input.nextLine();

        System.out.println("**** CARI BIOSKOP ****");

        boolean dataDitemukan = false;

        for (Bioskop bioskop : daftarBioskop) {

            if (bioskop.getIdBioskop().equals(cariBioskop)) {

                System.out.println("Data ketemu!");

                System.out.println(
                    "Id Bioskop: " + bioskop.getIdBioskop()
                    + " Rasa Popcorn: " + bioskop.getPopcorn()
                    + " Jenis Soft Drink: " + bioskop.getSoftdrink()
                    + " Jam Buka: " + bioskop.getWaktuBuka()
                );

                dataDitemukan = true;

                break;
            }
        }

        if (dataDitemukan == false) {
            System.out.println("Data tidak ditemukan");
        }

        System.out.println();


        // tampilan bioskop sebelum ada hapus data
        System.out.println("**** DAFTAR BIOSKOP ****");

        for (Bioskop bioskop : daftarBioskop) {

            System.out.println(
                "Id Bioskop: " + bioskop.getIdBioskop()
                + " Rasa Popcorn: " + bioskop.getPopcorn()
                + " Jenis Soft Drink: " + bioskop.getSoftdrink()
                + " Jam Buka: " + bioskop.getWaktuBuka()
            );

            System.out.println();
        }


        // hapus bioskop dengan id bioskop
        System.out.print("Masukkan ID Bioskop yang ingin dihapus: ");
        String idHapus = input.nextLine();

        System.out.println("**** HAPUS BIOSKOP ****");

        dataDitemukan = false;

        for (int i = 0; i < daftarBioskop.size(); i++) {

            if (daftarBioskop.get(i).getIdBioskop().equals(idHapus)) {

                daftarBioskop.remove(i);

                System.out.println("Data berhasil dihapus");

                dataDitemukan = true;

                break;
            }
        }

        if (dataDitemukan == false) {
            System.out.println("Data tidak ditemukan");
        }

        System.out.println();


        // daftar bioskop setelah ada data yang dihapus
        System.out.println(
            "**** DAFTAR BIOSKOP SETELAH ADA YANG DIHAPUS ****"
        );

        for (Bioskop bioskop : daftarBioskop) {

            System.out.println(
                "Id Bioskop: " + bioskop.getIdBioskop()
                + " Rasa Popcorn: " + bioskop.getPopcorn()
                + " Jenis Soft Drink: " + bioskop.getSoftdrink()
                + " Jam Buka: " + bioskop.getWaktuBuka()
            );

            System.out.println();
        }


        // ubah data
        System.out.print("Masukkan ID Bioskop yang ingin diubah: ");
        String idCari = input.nextLine();

        System.out.println("**** UPDATE DATA BIOSKOP ****");

        dataDitemukan = false;

        for (Bioskop bioskop : daftarBioskop) {

            if (bioskop.getIdBioskop().equals(idCari)) {

                System.out.print("Masukkan Rasa Popcorn Baru: ");
                popcornBaru = input.nextLine();

                System.out.print("Masukkan Jenis Soft Drink Baru: ");
                softdrinkBaru = input.nextLine();

                System.out.print("Masukkan Waktu Buka Baru: ");
                waktuBukaBaru = input.nextLine();

                bioskop.setPopcorn(popcornBaru);
                bioskop.setSoftdrink(softdrinkBaru);
                bioskop.setWaktubuka(waktuBukaBaru);

                System.out.println("Data berhasil diupdate");

                dataDitemukan = true;

                break;
            }
        }

        if (dataDitemukan == false) {
            System.out.println("Data tidak ditemukan");
        }

        input.close();
    }
}