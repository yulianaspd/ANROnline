<body>
    <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/save")?>">
        <table>
            <tr>
                <td>Nama Konfigurasi</td>
                <td>:</td>
                <td><input type="text" name="nama" required/></td>
            </tr>
            <tr>
                <td>Tipe Konfigurasi</td>
                <td>:</td>
                <td>
                    <select name="tipe"  class="autocomplete" style="width:40%">
                        <option value="Pilih" disabled selected>Pilih Tipe</option>
                        <option value="Header">Header</option>
                        <option value="Footer">Footer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Isi</td>
                <td>:</td>
                <td colspan="1"><textarea name="isi" id="wysiwyg"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    </form>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src='<?php echo base_url()?>assets/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste jbimages"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                relative_urls: false
            });
        });
    </script>