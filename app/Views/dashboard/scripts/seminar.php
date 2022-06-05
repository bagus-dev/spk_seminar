<script>
    $(document).ready(function() {
        $('#select2').select2({
            placeholder: "Pilih Bidang",
            allowClear: true,
            theme: 'bootstrap4'
        });
    });

    $("#seminar_date").datetimepicker({
        format: 'L',
        locale: 'id'
    });

    $("#start").datetimepicker({
        format: "LT",
        locale: 'id'
    });

    $("#end").datetimepicker({
        format: "LT",
        locale: 'id'
    });
</script>