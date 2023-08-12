<?php 
  session_start();
  require 'config/db.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHILIPPINE CROP INSURANCE CORPORATION (Calbiga)</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      @media screen and (max-width: 600px) {
        .navbar a{
          float: none;
          display: none;
          width: 100%;
        }
      }
      input[type=password], input[type=text], select, input[type=number]  {
        background: transparent;
        border: none;
        border-radius: 2px;
        border-bottom: 1px solid grey !important;
        padding: 2px 5px;
    }
    @media screen and (max-width: 600px) {
        .table{
          float: none;
          font-size:  10px;
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    