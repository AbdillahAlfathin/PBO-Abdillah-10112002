<?php

// --- BAGIAN INTERFACE ---
interface HewanInterface {
    public function Makan();
    public function Bergerak();
    public function Beranak();
}

class BurungInterface implements HewanInterface {
    public function Makan() {
        return "Burung (Interface) makan biji-bijian<br />";
    }
    public function Bergerak() {
        return "Burung (Interface) terbang<br />";
    }
    public function Beranak() {
        return "Burung (Interface) bertelur<br />";
    }
}

// --- BAGIAN ABSTRACT ---
abstract class HewanAbstract {
    abstract public function Makan();
    abstract public function Bergerak();
    abstract public function Beranak();
}

class KambingAbstract extends HewanAbstract {
    public function Makan() {
        return "Kambing (Abstract) makan rumput<br />";
    }
    public function Bergerak() {
        return "Kambing (Abstract) berjalan dan berlari<br />";
    }
    public function Beranak() {
        return "Kambing (Abstract) melahirkan<br />";
    }
}

// --- EKSEKUSI ---
$burung = new BurungInterface();
$kambing = new KambingAbstract();

echo "<b>Hasil Interface:</b><br />";
echo $burung->Makan();

echo "<br /><b>Hasil Abstract:</b><br />";
echo $kambing->Makan();

?>