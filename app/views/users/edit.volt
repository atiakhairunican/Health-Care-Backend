{{ form('users/update', 'role': 'form') }}
    <input type="hidden" name="txt_id" value=<?php echo $id ?>>
    <label for="nik">NIK</label>
    <input type="text" name="txt_nik" value="<?php echo $nik ?>">
    <br>
    <label for="name">Name</label>
    <input type="text" name="txt_name" value="<?php echo $name ?>">
    <br>
    <label for="sex">Gender</label>
    <input type="text" name="txt_sex" value="<?php echo $sex ?>">
    <br>
    <label for="religion">Religion</label>
    <input type="text" name="txt_religion" value="<?php echo $religion ?>">
    <br>
    <label for="phone">Phone</label>
    <input type="text" name="txt_phone" value="<?php echo $phone ?>">
    <br>
    <label for="address">Address</label>
    <input type="text" name="txt_address" value="<?php echo $address ?>">
    <br>
    <button type="submit">Save</button>
</form>