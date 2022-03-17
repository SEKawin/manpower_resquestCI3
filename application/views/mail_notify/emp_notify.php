<?php foreach($form as $emp): 
?>
<div style="font-family: Sans-serif; font-size: 12pt;">
    <p>
        เรื่อง ผลการอนุมัติที่คุณได้ขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ<br>
        เรียน คุณ <?php echo $emp->firstname_th . ' ' . $emp->lastname_th; ?>
    </p>

    <p>ระบบขอแจ้งผลการขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ ดังนี้</p>

    <table style="font-family: tahoma; font-size: 10pt;">
        <tr>
            <td align="left" valign="top"><b>ผู้ขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ: </b></td>
            <td valign="top">
                <?php echo $emp->code . ' ' . 'คุณ ' . $emp->firstname_th . ' ' . $emp->lastname_th; ?>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>ฝ่าย/สำนัก:: </b></td>
            <td valign="top"><?php echo $emp->department_code . ' ' . $emp->department_title; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>ตำแหน่งที่ขอ: </b></td>
            <td valign="top"><?php echo $emp->req_posi_name; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>จำนวนที่ต้องการ/วันที่ต้องการ:: </b></td>
            <td valign="top"><?php echo $emp->rec_num . 'คน /' . $emp->rec_date; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>Cost Center : </b></td>
            <td valign="top"><?php echo $emp->cost_center . ' ' . $emp->sec_div_dept; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top"><b>ผลสถานะการขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ: </b>
            </td>
            <td valign="top">
                <?php if ($emp->status_form == 0): ?>
                <spen style="color:blue; font-size: 14px;"><b>รอดำเนินการ</b></spen>
                <?php elseif ($emp->status_form == 1): ?>
                <spen style="color:green; font-size: 14px;"><b>แบบฟอร์มได้รับการอนุมัติ</b></spen>
                <?php else: ?>
                <spen style="color:red; font-size: 14px;"><b>ไม่แบบฟอร์มได้รับการอนุมัติ</b></spen>
                <br>
                <spen style="color:red; font-size: 14px;"><b>หมายเหตุ : <?php echo $emp->remark_form;?></b></spen>
                <?php endif;?>
            </td>
        </tr>

    </table>

    <p>โดยคุณ
        <?php echo $emp->firstname_th . ' ' . $emp->lastname_th; ?>
        สามารถเข้าระบบเพื่อตรวจสอบสาถนะอนุมัติฝึกอบรมภายนอกได้ที่
        <a href="http://www.hrd.tshpcl.com/manpower_request/"> Manpower Request Online </a>
        ระบบนี้ใช้งานได้ทั้งคอมพิวเตอร์ สมาร์ทโฟน และแท็บเบล็ต
    </p>
    <p>
        <i>
            <b>หมายเหตุ:</b><br>
            อีเมลฉบับนี้เป็นการแจ้งข้อมูลอัตโนมัติด้วยระบบขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ
            ขอความกรุณาอย่าตอบกลับอีเมลนี้
            <!-- หากท่านต้องการติดต่อสอบถามข้อมูลเพิ่มเติม ถ้าท่านมีปัญหากับการใช้งานระบบ Public Training Online -->
        </i>
    </p>

    <p>--</p>
    <p>
        ขอแสดงความนับถือ<br>
        ระบบขออนุมัติอัตรากำลัง/ขอกำลังคนในงบประมาณ (Manpower Request Online)<br>
        บริษัท ไทยซัมมิท ฮาร์เนส จำกัด (มหาชน)
    </p>
</div>
<?php endforeach;?>