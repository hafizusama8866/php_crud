<?php
session_start();
if (isset($_SESSION["create"])) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data Added Successfully!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    unset($_SESSION['create']);
}

if (isset($_SESSION["delete"])) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Data Deleted Successfully!</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
    unset($_SESSION['delete']);
}

if (isset($_SESSION["edit"])) {
    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Data Updated Successfully!</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
    unset($_SESSION['edit']);
}