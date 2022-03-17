<?php
foreach ($account as $row) :
?>
<div style="font-family: Sans-serif; font-size: 12pt;">
    <p>
        เรื่อง แจ้งข้อมูลเอกสารที่คุณต้องอนุมัติ<br>
        เรียน คุณ <?php echo $row->firstname_th . ' ' . $row->lastname_th; ?>
    </p>

    <p>ระบบขอแจ้งการร้องขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ<?php echo $position; ?> ดังนี้</p>

    <?php
        foreach ($form as $emp) :
        ?>
    <table style="font-family: Sans-serif; font-size: 12pt;">
        <tr>
            <td align="left" valign="top"><b>ผู้ขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ: </b></td>
            <td valign="top">
                <?php echo $emp->code . ' ' . 'คุณ ' . $emp->firstname_th . ' ' . $emp->lastname_th; ?>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>ฝ่าย/สำนัก: </b></td>
            <td valign="top"><?php echo $emp->department_code . ' ' . $emp->department_title; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>ตำแหน่งที่ขอ: </b></td>
            <td valign="top"><?php echo $emp->req_posi_name; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>จำนวนที่ต้องการ/วันที่ต้องการ: </b></td>
            <td valign="top"><?php echo $emp->rec_num . 'คน /' . $emp->rec_date; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>Cost Center : </b></td>
            <td valign="top"><?php echo $emp->cost_center . ' ' . $emp->sec_div_dept; ?></td>
        </tr>

    </table>
    <?php
        endforeach;
        ?>
    <p>โดยคุณ
        <?php echo $row->firstname_th . ' ' . $row->lastname_th; ?> สามารถเข้าระบบเพื่อทำการอนุมัติเอกสารได้ที่
        <a href="http://www.hrd.tshpcl.com/manpower_request/"> Manpower Request Online </a>
        ระบบนี้ใช้งานได้ทั้งคอมพิวเตอร์ สมาร์ทโฟน และแท็บเบล็ต
    </p>
    <p>
        <i>
            <b>หมายเหตุ:</b><br>
            อีเมลฉบับนี้เป็นการแจ้งข้อมูลอัตโนมัติด้วยระบบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ
            ขอความกรุณาอย่าตอบกลับอีเมลนี้
            <!-- หากท่านต้องการติดต่อสอบถามข้อมูลเพิ่มเติม ถ้าท่านมีปัญหากับการใช้งานระบบ Public Training Online -->
        </i>
    </p>

    <p>
        ขอแสดงความนับถือ<br>
        ระบบขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ (Manpower Request Online)<br>
        บริษัท ไทยซัมมิท ฮาร์เนส จำกัด (มหาชน)
    </p>
</div>
<?php
endforeach;
?>