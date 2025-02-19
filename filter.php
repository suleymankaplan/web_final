<?php
session_start();
ob_start();
require_once 'connect-database.php';

// Form verilerini al ve session'a kaydet
if (isset($_POST['tur'])) {
    $_SESSION['tur'] = $_POST['tur'];
} else {
    unset($_SESSION['tur']);
}

if (isset($_POST['beden'])) {
    $_SESSION['beden'] = $_POST['beden'];
} else {
    unset($_SESSION['beden']);
}

if (isset($_POST['stok'])) {
    $_SESSION['stok'] = $_POST['stok'];
} else {
    unset($_SESSION['stok']);
}

if (isset($_POST['renk'])) {
    $_SESSION['renk'] = $_POST['renk'];
} else {
    unset($_SESSION['renk']);
}


if (isset($_POST['filter-submit'])) {
    $conditions = [];
    // Tür filtresi
    if (isset($_POST['tur']) && !empty($_POST['tur'])) {
        $turConditions = [];
        foreach ($_POST['tur'] as $tur) {
            if ($tur == 'tisort') {
                $turConditions[] = "urun_tur='tisort'";
            } elseif ($tur == 'hoodie') {
                $turConditions[] = "urun_tur='hoodie'";
            }
        }
        if (!empty($turConditions)) {
            $conditions[] = '(' . implode(' OR ', $turConditions) . ')';
        }
    }

    // Beden filtresi
    if (isset($_POST['beden']) && !empty($_POST['beden'])) {
        $bedenConditions = [];
        $bedenChecked=[];
        foreach ($_POST['beden'] as $beden) {
            switch ($beden) {
                case 'xs':
                    $bedenConditions[] = "urun_beden_xs=1";
                    break;
                case 's':
                    $bedenConditions[] = "urun_beden_s=1";
                    break;
                case 'm':
                    $bedenConditions[] = "urun_beden_m=1";
                    break;
                case 'l':
                    $bedenConditions[] = "urun_beden_l=1";
                    break;
                case 'xl':
                    $bedenConditions[] = "urun_beden_xl=1";
                    break;
            }
        }
        if (!empty($bedenConditions)) {
            $conditions[] = '(' . implode(' OR ', $bedenConditions) . ')';
        }
    }

    // Stok filtresi
    if (isset($_POST['stok']) && !empty($_POST['stok'])) {
        $stokConditions = [];
        foreach ($_POST['stok'] as $stok) {
            switch ($stok) {
                case 'stokta':
                    $stokConditions[] = "urun_stok='var'";
                    break;
                case 'stokta-yok':
                    $stokConditions[] = "urun_stok='yok'";
                    break;
            }
        }
        if (!empty($stokConditions)) {
            $conditions[] = '(' . implode(' OR ', $stokConditions) . ')';
        }
    }

    // Renk filtresi
    if (isset($_POST['renk']) && !empty($_POST['renk'])) {
        $renkConditions = [];
        foreach ($_POST['renk'] as $renk) {
            switch ($renk) {
                case 'siyah':
                    $renkConditions[] = "urun_renk='siyah'";
                    break;
                case 'sari':
                    $renkConditions[] = "urun_renk='sari'";
                    break;
                case 'beyaz':
                    $renkConditions[] = "urun_renk='beyaz'";
                    break;
                case 'mavi':
                    $renkConditions[] = "urun_renk='mavi'";
                    break;
            }
        }
        if (!empty($renkConditions)) {
            $conditions[] = '(' . implode(' OR ', $renkConditions) . ')';
        }
    }

    // Koşulları birleştirme
    $key = implode(' AND ', $conditions);
    header("location:products.php?filter=selected&filters=".urlencode($key)."&".urlencode($turChecked));
    exit();
}

ob_end_flush();



//checked özelliği

?>
