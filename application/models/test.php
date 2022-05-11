 protected function generate_available_hours(
        $date,
        $service,
        $empty_periods
    )
    {
        $available_hours = [];
        $cnt=10;
        $test=1;
            $data=$this->CI->settings_model->get_days("1");
            $slot_split=empty($data[0]['value']) ? '1' : $data[0]['value'];
        foreach ($empty_periods as $period)
        {
            $start_hour = new DateTime($date . ' ' . $period['start']);
            $end_hour = new DateTime($date . ' ' . $period['end']);
            $interval = $service['availabilities_type'] === AVAILABILITIES_TYPE_FIXED ? (int)$service['duration'] : (int)$service['duration'];

            $current_hour = $start_hour;
            //print_r($current_hour);
               
            $diff = $current_hour->diff($end_hour);
            $in=$interval*1;
            //$in=$interval*$slot_split;
            if($test != 1){
                while (($diff->h * 60 + $diff->i) >= $in)
                {  
                    $available_hours[] = $current_hour->format('H:i');
                    $current_hour->add(new DateInterval('PT' . $in . 'M'));
                    $diff = $current_hour->diff($end_hour);               
                }
            }else{
                while (($diff->h * 60 + $diff->i) >= $in)
                {  
                    $available_hours[] = $current_hour->format('H:i');
                    $current_hour->add(new DateInterval('PT' . $in . 'M'));
                    $diff = $current_hour->diff($end_hour);
                    // $current_hour->add(new DateInterval('PT1H'));
                      
                }
            }
         
       

        }
        
        // for($i=0;$i<count($available_hours);$i+=15){
        //    print_r($available_hours->format('H:i'));
        // }    
        return $available_hours;
    }