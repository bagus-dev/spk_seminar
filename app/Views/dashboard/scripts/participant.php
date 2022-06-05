<script>
    $(document).ready(function() {
        $('#select2').select2({
            placeholder: "Pilih Seminar",
            allowClear: true,
            theme: 'bootstrap4'
        });

        $('#select2').change(e => {
            $.ajax({
                type: "GET",
                url: "/seminar",
                data: `seminar_id=${e.target.value}`,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: response => {
                    document.getElementById("date_seminar").value = response.value;
                }
            })
        });
    });
</script>