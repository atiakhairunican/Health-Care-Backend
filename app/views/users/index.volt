{{ form('users/create', 'role': 'form') }}
    <label for="nik">NIK</label>
    <input type="text" name="txt_nik">
    <br>
    <label for="name">Name</label>
    <input type="text" name="txt_name">
    <br>
    <label for="sex">Gender</label>
    <input type="text" name="txt_sex">
    <br>
    <label for="religion">Religion</label>
    <input type="text" name="txt_religion">
    <br>
    <label for="phone">Phone</label>
    <input type="text" name="txt_phone">
    <br>
    <label for="address">Address</label>
    <input type="text" name="txt_address">
    <br>
    <button type="submit">Save</button>
</form>

<?php
    echo Phalcon\Tag::linkTo("users/viewData", "Lihat Data");
?>