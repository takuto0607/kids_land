<?php

// 定員表示データ取得
function get_capacity_display_data () {
  $capsity  = get_field('capacity') ?: [];
  $age = [
    '1歳児' => 'age_1',
    '2歳児' => 'age_2',
    '3歳児' => 'age_3',
    '4歳児' => 'age_4',
    '5歳児' => 'age_5',
  ];
  
  // 職員数合計（嘱託医を除く）
  $capacity_total = 0;
  $capacity_list = [];
  
  foreach ($age as $age_label => $age_field) {
    $capacity_num = isset($capsity[$age_field]) ? intval($capsity[$age_field]) : 0;
    
    $capacity_total += $capacity_num;
    $capacity_list[] = [
      'label' => $age_label,
      'num' => $capacity_num,
    ];
  }

  return [
    'total' => $capacity_total,
    'list' => $capacity_list,
  ];
}

// 職員表示データ取得
function get_staff_display_data () {
  $staff  = get_field('staff_num') ?: [];
  $positions = [
    '園長' => 'director',
    '保育士' => 'nursery_teacher',
    '調理師' => 'cook',
    '看護師' => 'nurse',
    '事務員' => 'office_worker',
    '嘱託医' => 'contract_doctor',
  ];
  
  // 職員数合計（嘱託医を除く）
  $staff_total = 0;
  $contract_doctor_num = 0;
  $staff_list = [];
  
  foreach ($positions as $position_label => $position_field) {
    $staff_num = isset($staff[$position_field]) ? intval($staff[$position_field]) : 0;

    if ($position_field === 'contract_doctor') {
      $contract_doctor_num = $staff_num;
    } else {
      $staff_total += $staff_num;
      $staff_list[] = [
        'label' => $position_label,
        'num' => $staff_num,
      ];
    }
  }

  return [
    'total' => $staff_total,
    'contract_doctor_num' => $contract_doctor_num,
    'list' => $staff_list,
  ];
}