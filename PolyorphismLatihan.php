<?php

// 1. Definisi Class (Blueprint)
class Employee
{
    // Properti di-set private untuk keamanan data (Encapsulation)
    private $first_name;
    private $last_name;
    private $age;

    // Constructor untuk mengisi data saat objek dibuat
    public function __construct($first_name, $last_name, $age)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }

    // Method Getter untuk mengambil data dari luar class
    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

// ---------------------------------------------------------
// 2. Implementasi Objek (Penggunaan Class)

// Membuat objek karyawan pertama (Bob)
$objEmployeeOne = new Employee('Bob', 'Smith', 30);

echo "--- Karyawan 1 ---\n";
echo "Nama Depan: " . $objEmployeeOne->getFirstName() . "\n";
echo "Nama Belakang: " . $objEmployeeOne->getLastName() . "\n";
echo "Umur: " . $objEmployeeOne->getAge() . "\n\n";
echo "<br>";
// Membuat objek karyawan kedua (John)
$objEmployeeTwo = new Employee('John', 'Smith', 34);

echo "--- Karyawan 2 ---\n";
echo "Nama Depan: " . $objEmployeeTwo->getFirstName() . "\n";
echo "Nama Belakang: " . $objEmployeeTwo->getLastName() . "\n";
echo "Umur: " . $objEmployeeTwo->getAge() . "\n";

?>