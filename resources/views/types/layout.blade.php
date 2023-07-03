<!DOCTYPE html>
<html>
<head>
    <title>Informasi Jenis Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <style>
        .input {
            font-size: 14px;
            color: gray;
            padding: 10px 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    
<div class="container">
    @yield('content')
</div>
    
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datepicker({
            format: "yyyy/mm/dd",
            weekStart: 0,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true, 
            orientation: "auto"
        });
    });
    $(function () {
        $('#datetimepicker2').datepicker({
            format: "yyyy/mm/dd",
            weekStart: 0,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true, 
            orientation: "auto"
        });
    });
</script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
</body>
</html>