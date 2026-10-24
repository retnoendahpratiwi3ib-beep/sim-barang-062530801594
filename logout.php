<?php
session_start();
session_destroy();           // hapus semua data session
header("Location: login.php");
exit;