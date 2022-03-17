<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <title>QFM-HR-1-004/REV.01</title>
    <style type="text/css">
        p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            background: gray;
        }

        body #page1 {
            position: relative;
            /* margin: auto; */
            width: 210mm;
            height: 300mm;
        }

        .font {
            font-size: 12px;
            font-family: 'Sarabun', sans-serif;

        }

        .textAlignVer {
            display: block;
            filter: flipv fliph;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            transform: rotate(-90deg);
            position: relative;
            width: 20px;
            white-space: nowrap;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>
    <?php
    function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    ?>
    <?php foreach ($form as $row) : ?>

        <div style="position:absolute;left:0px;top:0px">
            <img src="<?php echo base_url('uploads/report/QFM-HR-1-004.png') ?>" width="1000" height="1450">
        </div>
        <div style="position:absolute;left:70px;top:30px">
            <img src="<?php echo base_url('assets/TSH.png') ?>" width="60" height="50">
        </div>
        <div style="position:absolute;left:175px;top:35px">บริษัทไทยซัมมิท ฮาร์เนส จำกัด(มหาชน)</div>
        <div style="position:absolute;left:175px;top:55px">THAI SUMMIT HARNESS PUBLIC CO.,LTD.</div>
        <div style="position:absolute;left:615px;top:35px">ใบขออนุมัติอัตรากำลัง / ใบขอกำลงคนในงบประมาณ</div>
        <div style="position:absolute;left:650px;top:55px">MANPOWER REQUISITION FORM</div>

        <div style="position:absolute;left:32px;top:85px">No. MRF.</div>
        <div style="position:absolute;left:105px;top:85px"><?php echo $row->hr_no . ' / ' . $row->year; ?> </div>
        <div style="position:absolute;left:585px;top:85px">COST CENTER : </b></div>
        <div style="position:absolute;left:740px;top:85px"><?php echo $row->cost_center; ?></div>

        <div class="font">
            <div style="position:absolute;left:32px;top:115px">ตำแหน่งที่ขอ</div>
            <div style="position:absolute;left:32px;top:130px">REQUIRED POSITION TITLE</div>
            <div style="position:absolute;left:200px;top:120px"><?php echo $row->req_posi_name; ?></div>

            <div style="position:absolute;left:585px;top:115px">แผนก/ส่วน/ฝ่าย</div>
            <div style="position:absolute;left:585px;top:130px">SEC/DIV/DEPT</div>
            <div style="position:absolute;left:700px;top:120px"><?php echo $row->sec_div_dept; ?></div>

            <div style="position:absolute;left:32px;top:155px">จำนวนที่ต้องการ</div>
            <div style="position:absolute;left:32px;top:170px">RECEIVED NUMBER</div>
            <div style="position:absolute;left:170px;top:160px"><?php echo $row->rec_num; ?></div>

            <div style="position:absolute;left:300px;top:155px">วันที่ต้องการ </div>
            <div style="position:absolute;left:300px;top:170px">RECEIVED DATE</div>
            <div style="position:absolute;left:420px;top:160px"><?php echo $row->rec_date; ?></div>

            <div style="position:absolute;left:585px;top:155px">แหล่งของบุคลากร</div>
            <div style="position:absolute;left:585px;top:170px">SOURCE OF PERSON</div>
            <?php if ($row->sou_of_person == 0) :
                echo '<div style="position:absolute;left:735px;top:150px;font-size:25px;">&check;</div>';
            else :
                echo '<div style="position:absolute;left:835px;top:150px;font-size:25px;">&check;</div>';
            endif; ?>
            <div style="position:absolute;left:730px;top:155px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:750px;top:155px">ภายใน </div>
            <div style="position:absolute;left:750px;top:170px">INTERNAL </div>
            <div style="position:absolute;left:830px;top:155px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:850px;top:155px">ภายนอก </div>
            <div style="position:absolute;left:850px;top:170px">EXTERNAL </div>

            <!-- ประเภทของความต้องการ -->
            <div style="position:absolute;left:32px;top:195px">ประเภทของความต้องการ</div>
            <div style="position:absolute;left:32px;top:210px">TYPE OF RECEIVED</div>

            <?php if ($row->type_of_rec == 0) :
                echo '<div style="position:absolute;left:215px;top:190px;font-size:25px;">&check;</div>';
            else :
                echo '<div style="position:absolute;left:215px;top:225px;font-size:25px;">&check;</div>';
            endif; ?>
            <div style="position:absolute;left:210px;top:195px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:230px;top:195px">เพิ่มจำนวน</div>
            <div style="position:absolute;left:230px;top:210px">ADDITIONAL</div>
            <div style="position:absolute;left:480px;top:195px">มีตำแหน่งงานอยู่ในแผนอัตรากำลัง</div>
            <div style="position:absolute;left:480px;top:210px">POSITION IN MANPOWER BUDGET ?</div>

            <?php if ($row->pos_in_manp == 0) :
                echo '<div style="position:absolute;left:735px;top:190px;font-size:25px;">&check;</div>';
            else :
                echo '<div style="position:absolute;left:735px;top:190px;font-size:25px;">&check;</div>';
            endif; ?>

            <div style="position:absolute;left:730px;top:195px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:750px;top:195px">ใช่ </div>
            <div style="position:absolute;left:750px;top:210px">YES </div>
            <div style="position:absolute;left:850px;top:195px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:870px;top:195px">ไมใช่ </div>
            <div style="position:absolute;left:870px;top:210px">NO </div>

            <div style="position:absolute;left:210px;top:230px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:230px;top:230px">ทดแทน </div>
            <div style="position:absolute;left:230px;top:245px">REPLACEMENT</div>
            <div style="position:absolute;left:480px;top:230px">บุคคลที่ถูกทดแทน</div>
            <div style="position:absolute;left:480px;top:245px">PERSON REPLACED</div>
            <div style="position:absolute;left:630px;top:240px"><?php echo $row->per_replaced; ?></div>

            <div style="position:absolute;left:245px;top:275px">เหตุผลของการทดแทน</div>
            <div style="position:absolute;left:245px;top:290px">REASON OF REPLACEMENT</div>
            <?php
            if ($row->reason_of_replaces == NULL) :
                echo '';
            elseif ($row->reason_of_replaces == 1) :
                echo '<div style="position:absolute;left:455px;top:270px;font-size:25px;">&check;</div>';
            elseif ($row->reason_of_replaces == 2) :
                echo '<div style="position:absolute;left:635px;top:270px;font-size:25px;">&check;</div>';
            elseif ($row->reason_of_replaces == 3) :
                echo '<div style="position:absolute;left:835px;top:270px;font-size:25px;">&check;</div>';
            endif; ?>

            <div style="position:absolute;left:450px;top:275px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:470px;top:275px">ลาออก </div>
            <div style="position:absolute;left:470px;top:290px">RESIGNED </div>
            <div style="position:absolute;left:630px;top:275px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:650px;top:275px">ปลดออก</div>
            <div style="position:absolute;left:650px;top:290px">TERMINATION</div>
            <div style="position:absolute;left:830px;top:275px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:850px;top:275px">อื่นๆ </div>
            <div style="position:absolute;left:850px;top:290px">OTHERS </div>
            <!-- ประเภทของความต้องการ -->

            <!-- ประเภทของพนักงาน -->
            <div style="position:absolute;left:32px;top:320px">ประเภทของพนักงาน</div>
            <div style="position:absolute;left:32px;top:335px">TYPE OF EMPLOYEE</div>
            <?php if ($row->type_of_emp == 1) :
                // ผู้จัดการฝ่าย
                echo '<div style="position:absolute;left:180px;top:315px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 2) :
                // หัวหน้ากลุ่ม
                echo '<div style="position:absolute;left:300px;top:315px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 3) :
                // เจ้าหน้าที่ (Staff)
                echo '<div style="position:absolute;left:400px;top:315px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 4) :
                // เจ้าหน้าที่ (Officer)
                echo '<div style="position:absolute;left:510px;top:315px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 5) :
                // หัวหน้าแผนก
                echo '<div style="position:absolute;left:630px;top:315px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 6) :
                // หัวหน้าส่วน
                echo '<div style="position:absolute;left:730px;top:315px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 7) :
                // วิศวกร (Engineer)
                echo '<div style="position:absolute;left:180px;top:355px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 8) :
                // พนักงานทั่วไป
                echo '<div style="position:absolute;left:300px;top:355px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 9) :
                // พนักงาน 11 เดือน
                echo '<div style="position:absolute;left:400px;top:355px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 10) :
                // พนักงานรับเหมาแรงงาน (Subcontractor)
                echo '<div style="position:absolute;left:510px;top:355px;font-size:25px;">&check;</div>';
            elseif ($row->type_of_emp == 11) :
                // นักศึกษาฝึกงาน
                echo '<div style="position:absolute;left:740px;top:355px;font-size:25px;">&check;</div>';
            // else :
            //     echo '<div style="position:absolute;left:655px;top:355px;font-size:25px;">&check;</div>';
            endif; ?>
            <!-- ประเภทของพนักงาน -->

            <div style="position:absolute;left:180px;top:320px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:200px;top:325px">ผู้จัดการฝ่าย</div>
            <!-- <div style="position:absolute;left:230px;top:335px">TOP MANAGEMENT</div> -->

            <div style="position:absolute;left:300px;top:320px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:320px;top:325px">หัวหน้ากลุ่ม</div>
            <!-- <div style="position:absolute;left:460px;top:335px">MIDDLE MANAGEMENT</div> -->

            <div style="position:absolute;left:400px;top:320px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:420px;top:325px">เจ้าหน้าที่ (Staff) </div>
            <!-- <div style="position:absolute;left:670px;top:335px">SUPERVISORY </div> -->

            <div style="position:absolute;left:510px;top:320px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:530px;top:325px">เจ้าหน้าที่ (Officer) </div>
            <!-- <div style="position:absolute;left:870px;top:335px">STAFF </div> -->

            <div style="position:absolute;left:630px;top:320px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:650px;top:325px">หัวหน้าแผนก </div>
            <!-- <div style="position:absolute;left:230px;top:380px">WORKER </div> -->

            <div style="position:absolute;left:730px;top:320px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:750px;top:325px">หัวหน้าส่วน</div>
            <!-- <div style="position:absolute;left:460px;top:380px">STUDENT TRAINEE</div> -->

            <div style="position:absolute;left:180px;top:360px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:200px;top:365px">วิศวกร (Engineer)</div>
            <!-- <div style="position:absolute;left:670px;top:380px">SUB-CONTRACTOR</div> -->

            <div style="position:absolute;left:300px;top:360px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:320px;top:365px">พนักงานทั่วไป</div>

            <div style="position:absolute;left:400px;top:360px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:420px;top:365px">พนักงาน 11 เดือน</div>

            <div style="position:absolute;left:510px;top:360px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:530px;top:365px">พนักงานรับเหมาแรงงาน (Subcontractor)</div>

            <div style="position:absolute;left:740px;top:360px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:760px;top:365px">นักศึกษาฝึกงาน</div>
            <!-- ประเภทของพนักงาน -->

            <!-- ประเภทการจ้าง -->
            <div style="position:absolute;left:32px;top:400px">ประเภทการจ้าง</div>
            <div style="position:absolute;left:32px;top:420px">TYPE OF EMPLOYMENT</div>
            <?php if ($row->type_of_employment == 0) :
                echo '<div style="position:absolute;left:235px;top:395px;font-size:25px;">&check;</div>';
            else :
                echo '<div style="position:absolute;left:455px;top:395px;font-size:25px;">&check;</div>';
            endif; ?>

            <div style="position:absolute;left:230px;top:400px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:250px;top:400px">จ้างประจำ</div>
            <div style="position:absolute;left:250px;top:420px">PERMANENT </div>
            <div style="position:absolute;left:450px;top:400px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:470px;top:400px">จ้างชั่วคราว</div>
            <div style="position:absolute;left:470px;top:420px">TEMPORARY </div>
            <div style="position:absolute;left:640px;top:400px">ระยะเวลาการจ้าง</div>
            <div style="position:absolute;left:640px;top:420px">DURATION OF EMPLOYMENT FROM</div>
            <div style="position:absolute;left:750px;top:405px"><?php echo $row->dur_of_emp; ?></div>
            <!-- ประเภทการจ้าง -->
            <!-- เอกสารประกอบใบคำขอ -->
            <div style="position:absolute;left:32px;top:440px">เอกสารประกอบใบคำขอ</div>
            <div style="position:absolute;left:32px;top:460px">DOCUMENTS ATTACHED</div>
            <?php if (!empty($row->attach_doc1)) :
                echo '<div style="position:absolute;left:225px;top:435px;font-size:25px;">&check;</div>';
            endif;
            if (!empty($row->attach_doc2)) :
                echo '<div style="position:absolute;left:455px;top:435px;font-size:25px;">&check;</div>';
            endif;
            if (!empty($row->attach_doc3)) :
                echo '<div style="position:absolute;left:625px;top:435px;font-size:25px;">&check;</div>';
            endif;
            ?>

            <div style="position:absolute;left:220px;top:440px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:240px;top:440px">แผนผังหน่วยงาน/แผนก</div>
            <div style="position:absolute;left:240px;top:460px">SHOP/SECT. ORGANIZATION CHART</div>
            <div style="position:absolute;left:450px;top:440px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:470px;top:440px">คำบรรยายลักษณะงาน</div>
            <div style="position:absolute;left:470px;top:460px">JOB DESCRIPTION</div>
            <div style="position:absolute;left:620px;top:440px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:640px;top:440px">ใบลาออกของพนักงานผู้ลาออก</div>
            <div style="position:absolute;left:640px;top:460px">RESIGNATIONฟ LETTER</div>
            <!-- เอกสารประกอบใบคำขอ -->

            <!-- หน้าที่ความรับผิดชอบ -->
            <div style="position:absolute;left:32px;top:480px">หน้าที่ความรับผิดชอบ</div>
            <div style="position:absolute;left:32px;top:500px">DUTY/RESPONSIBILITIES</div>
            <?php if ($row->duty_resp_choice == 0) : ?>
                <div style="position:absolute;left:180px;top:485px;width: 66em; word-wrap: break-word;"><?php echo $row->duty_resp; ?></div>
            <?php elseif ($row->duty_resp_choice == 1) : ?>
                <div style="position:absolute;left:180px;top:485px;width: 66em; word-wrap: break-word;">เอกสารแนบ</div>

            <?php endif; ?>
            <!-- หน้าที่ความรับผิดชอบ -->

            <!-- คุุณสมบัติ -->
            <div class="textAlignVer" style="position:absolute;left:29px;top:600px"><b>คุณสมบัติ</b></div>
            <div class="textAlignVer" style="position:absolute;left:44px;top:620px"><b>QUALIFICATION</b></div>
            <div style="position:absolute;left:75px;top:525px">เพศ / อายุ</div>
            <div style="position:absolute;left:75px;top:540px">SEX/AGES</div>

            <div style="position:absolute;left:200px;top:530px"><?php echo $row->sex_emp . ' / ' . $row->age_emp; ?></div>
            <div style="position:absolute;left:415px;top:530px">ประสบการณ์ </div>
            <div style="position:absolute;left:415px;top:550px">EXPERIENCE </div>
            <div style="position:absolute;left:490px;top:530px;width: 18em; word-wrap: break-word;"><?php echo $row->experience; ?></div>

            <div style="position:absolute;left:745px;top:530px">อื่นๆ</div>
            <div style="position:absolute;left:745px;top:550px">OTHERS </div>
            <div style="position:absolute;left:790px;top:530px;width: 16em; word-wrap: break-word;"><?php echo $row->other; ?></div>

            <div style="position:absolute;left:75px;top:565px">การศึกษา </div>
            <div style="position:absolute;left:75px;top:580px">EDUCATION </div>
            <div style="position:absolute;left:200px;top:565px"><?php echo $row->education_emp; ?> </div>

            <div style="position:absolute;left:75px;top:600px">ทักษะ / ความชำนาญ</div>
            <div style="position:absolute;left:75px;top:615px">SKILL/EXPERT </div>

            <?php if ($row->skill_expert_choice == 0) : ?>
                <div style="position:absolute;left:195px;top:605px;width: 17em; word-wrap: break-word;"><?php echo $row->skill_expert; ?></div>
            <?php elseif ($row->skill_expert_choice == 1) : ?>
                <div style="position:absolute;left:195px;top:605px;width: 17em; word-wrap: break-word;">เอกสารแนบ</div>
            <?php endif; ?>

            <!-- คุุณสมบัติ -->

            <!-- สำหรับหน่วยงานที่ขอ -->
            <div style="position:absolute;left:450px;top:665px"><b>สำหรับหน่วยงานที่ขอ</b></div>
            <div style="position:absolute;left:400px;top:685px"><b>FOR REQUESTED SECTION / DEPARTMENT</b></div>
            <div style="position:absolute;left:35px;top:710px">ผู้ขอจ้าง </div>
            <div style="position:absolute;left:35px;top:730px">REQUESTED BY</div>
            <?php
            $data = $this->account_m->get_account_code($row->dept_mgr_code);
            foreach ($data as $mgr) :
                $mgr_name =  $mgr->salutation . ' ' . $mgr->firstname_th . ' ' . $mgr->lastname_th;
            endforeach;
            if ($row->status_dept_mgr == 1) :
                $mgr_name;
                $update_mgr = DateThai($row->update_mgr);
            elseif ($row->status_dept_mgr == 2) :
                $mgr_name;
                $update_mgr = DateThai($row->update_mgr);
            else :
                $mgr_name = '';
                $update_mgr = '';
            endif; ?>
            <div style="position:absolute;left:120px;top:760px"><?php echo $mgr_name ?></div>
            <div style="position:absolute;left:35px;top:760px">ลงชื่อ</div>
            <div style="position:absolute;left:35px;top:780px">SIGNATURE</div>
            <div style="position:absolute;left:150px;top:800px">ผู้จัดการฝ่าย</div>
            <div style="position:absolute;left:100px;top:820px">วันที่ </div>
            <div style="position:absolute;left:130px;top:820px"><?php echo $update_mgr; ?> </div>

            <div style="position:absolute;left:330px;top:710px">ผู้ทบทวน </div>
            <div style="position:absolute;left:330px;top:730px">CHECKED BY</div>
            <?php
            $data = $this->account_m->get_account_code($row->agm_code);
            foreach ($data as $agm) :
                $agm_name =  $agm->salutation . ' ' . $agm->firstname_th . ' ' . $agm->lastname_th;
            endforeach;
            if ($row->status_agm == 1) :
                $agm_name;
                $update_agm = DateThai($row->update_agm);
            elseif ($row->status_agm == 2) :
                $agm_name;
                $update_agm = DateThai($row->update_agm);
            else :
                $agm_name = '';
                $update_agm = '';
            endif; ?>
            <div style="position:absolute;left:400px;top:760px"><?php echo $agm_name; ?></div>
            <div style="position:absolute;left:330px;top:760px">ลงชื่อ </div>
            <div style="position:absolute;left:330px;top:780px">SIGNATURE </div>
            <div style="position:absolute;left:450px;top:800px">ผู้ช่วยผู้จัดการทั่วไป </div>
            <div style="position:absolute;left:430px;top:820px">วันที่ </div>
            <div style="position:absolute;left:460px;top:820px"><?php echo $update_agm; ?> </div>

            <div style="position:absolute;left:660px;top:710px">ผู้อนุมัติคำขอขั้นต้น</div>
            <div style="position:absolute;left:660px;top:730px">INITIAL APPROVAL BY</div>
            <?php
            $data = $this->account_m->get_account_code($row->gm_code);
            foreach ($data as $gm) :
                $gm_name =  $gm->salutation . ' ' . $gm->firstname_th . ' ' . $gm->lastname_th;
            endforeach;
            if ($row->status_gm == 1) :
                $gm_name;
                $update_gm = DateThai($row->update_gm);
            elseif ($row->status_gm == 2) :
                $gm_name;
                $update_gm = DateThai($row->update_gm);
            else :
                $gm_name = '';
                $update_gm = '';
            endif; ?>
            <div style="position:absolute;left:750px;top:760px"><?php echo $gm_name; ?> </div>
            <div style="position:absolute;left:660px;top:760px">ลงชื่อ </div>
            <div style="position:absolute;left:660px;top:780px">SIGNATURE </div>
            <div style="position:absolute;left:810px;top:800px">ผู้จัดการทั่วไป </div>
            <div style="position:absolute;left:760px;top:820px">วันที่ </div>
            <div style="position:absolute;left:800px;top:820px"><?php echo $update_gm; ?> </div>
            <!-- สำหรับหน่วยงานที่ขอ -->

            <!-- สำหรับสำนักพัฒนาองค์กร -->
            <div style="position:absolute;left:450px;top:865px"><b>สำหรับสำนักพัฒนาองค์กร </b></div>
            <div style="position:absolute;left:410px;top:885px"><b> ORGANIZATION DEVELOPMENT OFFICE</b></div>
            <?php
            $data = $this->account_m->get_account_code($row->hrm_mgr_code);
            foreach ($data as $hrm_mgr) :
                $hrm_mgr_name =  $hrm_mgr->salutation . ' ' . $hrm_mgr->firstname_th . ' ' . $hrm_mgr->lastname_th;
            endforeach;
            if ($row->status_hrm_mgr == 1) :
                echo '<div style="position:absolute;left:45px;top:905px;font-size:25px;">&check;</div>';
                $hrm_mgr_name;
                $remark_hrm_mgr = '';
                $update_hrm_mgr = DateThai($row->update_hrm_mgr);
            elseif ($row->status_hrm_mgr == 2) :
                echo '<div style="position:absolute;left:45px;top:945px;font-size:25px;">&check;</div>';
                $hrm_mgr_name;
                $remark_hrm_mgr = $row->remark_hrm_mgr;
                $update_hrm_mgr = DateThai($row->update_hrm_mgr);
            else :
                echo '<div style="position:absolute;left:40px;top:910px;font-size:22px;">&#9744;</div>';
                $hrm_mgr_name = '';
                $remark_hrm_mgr = '';
                $update_hrm_mgr = '';
            endif; ?>
            <div style="position:absolute;left:40px;top:910px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:60px;top:910px">เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:60px;top:925px">RECOMMEND FOR APPROVAL</div>
            <div style="position:absolute;left:40px;top:950px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:60px;top:950px">ไม่เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:160px;top:950px"><?php $remark_hrm_mgr ?> </div>
            <div style="position:absolute;left:60px;top:965px">NOT RECOMMEND FOR APPROVAL BECAUSE</div>
            <div style="position:absolute;left:100px;top:1030px"><?php echo $hrm_mgr_name; ?></div>
            <div style="position:absolute;left:35px;top:1030px">ลงชื่อ</div>
            <div style="position:absolute;left:35px;top:1050px">SIGNATURE </div>
            <div style="position:absolute;left:150px ;top:1070px">ผู้จัดการฝ่าย </div>
            <div style="position:absolute;left:100px;top:1090px">วันที่ </div>
            <div style="position:absolute;left:130px;top:1090px"><?php echo $update_hrm_mgr; ?> </div>

            <?php
            $data = $this->account_m->get_account_code($row->hrm_agm_code);
            foreach ($data as $hrm_agm) :
                $hrm_agm_name =  $hrm_agm->salutation . ' ' . $hrm_agm->firstname_th . ' ' . $hrm_agm->lastname_th;
            endforeach;
            if ($row->status_hrm_agm == 1) :
                echo '<div style="position:absolute;left:335px;top:905px;font-size:25px;">&check;</div>';
                $hrm_agm_name;
                $remark_hrm_agm = '';
                $update_hrm_agm = DateThai($row->update_hrm_agm);
            elseif ($row->status_hrm_agm == 2) :
                echo '<div style="position:absolute;left:335px;top:945px;font-size:25px;">&check;</div>';
                $hrm_agm_name;
                $remark_hrm_agm = $row->remark_hrm_agm;
                $update_hrm_agm = DateThai($row->update_hrm_agm);
            else :
                $hrm_agm_name = '';
                $remark_hrm_agm = '';
                $update_hrm_agm = '';
            endif; ?>

            <div style="position:absolute;left:330px;top:910px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:350px;top:910px">เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:350px;top:925px">RECOMMEND FOR APPROVAL</div>
            <div style="position:absolute;left:330px;top:950px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:350px;top:950px">ไม่เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:450px;top:950px"><?php echo $remark_hrm_agm; ?> </div>
            <div style="position:absolute;left:350px;top:965px">NOT RECOMMEND FOR APPROVAL BECAUSE</div>
            <div style="position:absolute;left:400px;top:1030px"><?php echo $hrm_agm_name; ?></div>
            <div style="position:absolute;left:330px;top:1030px">ลงชื่อ </div>
            <div style="position:absolute;left:330px;top:1050px">SIGNATURE </div>
            <div style="position:absolute;left:450px;top:1070px">ผู้ช่วยผู้จัดการทั่วไป </div>
            <div style="position:absolute;left:400px;top:1090px">วันที่ </div>
            <div style="position:absolute;left:430px;top:1090px"><?php echo $update_hrm_agm; ?> </div>

            <?php
            $data = $this->account_m->get_account_code($row->od_code);
            foreach ($data as $od) :
                $od_name =  $od->salutation . ' ' . $od->firstname_th . ' ' . $od->lastname_th;
            endforeach;
            if ($row->status_od == 1) :
                echo '<div style="position:absolute;left:665px;top:905px;font-size:25px;">&check;</div>';
                $od_name;
                $remark_od = '';
                $update_od = DateThai($row->update_od);
            elseif ($row->status_od == 2) :
                echo '<div style="position:absolute;left:665px;top:945px;font-size:25px;">&check;</div>';
                $od_name;
                $remark_od = $row->remark_od;
                $update_od = DateThai($row->update_od);
            else :
                $od_name = '';
                $remark_od = '';
                $update_od = '';
            endif; ?>
            <div style="position:absolute;left:660px;top:910px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:680px;top:910px">เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:680px;top:925px">RECOMMEND FOR APPROVAL</div>
            <div style="position:absolute;left:660px;top:950px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:680px;top:950px">ไม่เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:780px;top:950px"><?php echo $remark_od; ?> </div>
            <div style="position:absolute;left:680px;top:965px">NOT RECOMMEND FOR APPROVAL BECAUSE</div>
            <div style="position:absolute;left:730px;top:1030px"><?php echo $od_name; ?> </div>
            <div style="position:absolute;left:660px;top:1030px">ลงชื่อ </div>
            <div style="position:absolute;left:660px;top:1050px">SIGNATURE </div>
            <div style="position:absolute;left:810px;top:1070px">ผู้จัดการทั่วไป </div>
            <div style="position:absolute;left:750px;top:1090px">วันที่ </div>
            <div style="position:absolute;left:800px;top:1090px"><?php echo $update_od; ?> </div>
            <!-- สำหรับสำนักพัฒนาองค์กร -->

            <!-- การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการ -->
            <div style="position:absolute;left:180px;top:1125px"><b>การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการ</b>
            </div>
            <div style="position:absolute;left:250px;top:1145px"><b>FOR COMMENT FROM EVP</b></div>
            <?php
            $data = $this->account_m->get_account_code($row->evp_code);
            foreach ($data as $evp) :
                $evp_name =  $evp->salutation . ' ' . $evp->firstname_th . ' ' . $evp->lastname_th;
            endforeach;

            if ($row->status_evp == 1) :
                echo '<div style="position:absolute;left:45px;top:1165px;font-size:25px;">&check;</div>';
                $evp_name;
                $remark_evp = '';
                $update_evp = DateThai($row->update_evp);
            elseif ($row->status_evp == 2) :
                echo '<div style="position:absolute;left:45px;top:1215px;font-size:25px;">&check;</div>';
                $evp_name;
                $update_evp = DateThai($row->update_evp);
            else :
                $evp_name = '';
                $remark_evp = '';
                $update_evp = '';
            endif; ?>

            <div style="position:absolute;left:40px;top:1170px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:60px;top:1170px">เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:60px;top:1185px">RECOMMEND FOR APPROVAL</div>
            <div style="position:absolute;left:40px;top:1220px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:60px;top:1220px">ไม่เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:160px;top:1220px"><?php echo $remark_evp; ?> </div>
            <div style="position:absolute;left:60px;top:1235px">NOT RECOMMEND FOR APPROVAL BECAUSE</div>

            <div style="position:absolute;left:100px;top:1320px"><?php echo $evp_name; ?></div>
            <div style="position:absolute;left:35px;top:1320px">ลงชื่อ</div>
            <div style="position:absolute;left:35px;top:1340px">SIGNATURE </div>
            <div style="position:absolute;left:125px;top:1360px">(ดร.สาโรจน์ วสุวานิช)</div>
            <div style="position:absolute;left:140px;top:1380px">กรรมการผู้จัดการ </div>
            <div style="position:absolute;left:90px;top:1400px">วันที่ </div>
            <div style="position:absolute;left:120px;top:1400px"><?php echo $update_evp; ?> </div>

            <?php
            $data = $this->account_m->get_account_code($row->svp_code);
            foreach ($data as $svp) :
                $svp_name =  $svp->salutation . ' ' . $svp->firstname_th . ' ' . $svp->lastname_th;
            endforeach;

            if ($row->status_svp == 1) :
                echo '<div style="position:absolute;left:335px;top:1165px;font-size:25px;">&check;</div>';
                $svp_name;
                $remark_svp = '';
                $update_svp = DateThai($row->update_svp);
            elseif ($row->status_svp == 2) :
                echo '<div style="position:absolute;left:335px;top:1215px;font-size:25px;">&check;</div>';
                $svp_name;
                $update_svp = DateThai($row->update_svp);
            else :
                $svp_name = '';
                $remark_svp = '';
                $update_svp = '';
            endif; ?>

            <div style="position:absolute;left:330px;top:1170px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:350px;top:1170px">เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:350px;top:1185px">RECOMMEND FOR APPROVAL</div>
            <div style="position:absolute;left:330px;top:1220px;font-size:22px;">&#9744;</div>
            <div style="position:absolute;left:350px;top:1220px">ไม่เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:440px;top:1220px">ไม่เห็นควรอนุมัติ </div>
            <div style="position:absolute;left:350px;top:1235px">NOT RECOMMEND FOR APPROVAL BECAUSE</div>
            <div style="position:absolute;left:330px;top:1270px">อัตราเงินเดือน </div>
            <div style="position:absolute;left:530px;top:1270px">บาท/เดือน</div>
            <div style="position:absolute;left:330px;top:1285px">SALARY </div>
            <div style="position:absolute;left:530px;top:1285px">BAHT/MONTH</div>
            <div style="position:absolute;left:400px;top:1320px"><?php echo $svp_name; ?> </div>
            <div style="position:absolute;left:330px;top:1320px">ลงชื่อ </div>
            <div style="position:absolute;left:330px;top:1340px">SIGNATURE </div>
            <div style="position:absolute;left:450px;top:1360px">(นางสาวชนาพรรณ จึงรุ่งเรืองกิจ)</div>
            <div style="position:absolute;left:450px;top:1380px">รองประธานกรรมการอาวุโส</div>
            <div style="position:absolute;left:400px;top:1400px">วันที่</div>
            <div style="position:absolute;left:420px;top:1400px"><?php echo $update_svp;  ?> </div>

            <!-- การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการ -->
            <!-- สำหรับเจ้าหน้าที่ฝ่ายทรัพยากรมนุษย์และธุรการ -->
            <div style="position:absolute;left:700px;top:1125px"><b>สำหรับเจ้าหน้าที่ฝ่ายทรัพยากรมนุษย์และธุรการ</b>
            </div>
            <div style="position:absolute;left:730px;top:1145px"><b>FOR HUMAN RESOURCES STAFF</b></div>
            <div style="position:absolute;left:655px;top:1180px">ผู้ถูกคัดเลือก </div>
            <div style="position:absolute;left:655px;top:1200px">CANDIDATE NAME</div>
            <div style="position:absolute;left:655px;top:1250px">วันเริ่มจ้าง </div>
            <div style="position:absolute;left:655px;top:1270px">STARTING DATE</div>
            <div style="position:absolute;left:655px;top:1320px">สวัสดิการอื่น ๆ </div>
            <div style="position:absolute;left:655px;top:1340px">OTHER BENEFITS</div>
            <!-- สำหรับเจ้าหน้าที่ฝ่ายทรัพยากรมนุษย์และธุรการ -->
        <?php endforeach; ?>


        <div style="position:absolute;left:810px;top:1420px">QFM-HR-1-004/REV.02</div>
        </div>


</body>

</html>