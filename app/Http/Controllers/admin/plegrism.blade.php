// correct code
        $fp = @fopen(public_path($name), 'r');
        $fpabc = @fopen(public_path("error/main.cpp"), 'r');
        // // Add each line to an array
        if ($fp) {
            $array = explode("\n", fread($fp, filesize(public_path($name))));
        }
        if ($fpabc) {
            $arrayabc = explode("\n", fread($fpabc, filesize(public_path("error/main.cpp"))));
        }
        // dd($array, $arrayabc);
        $array = array_filter($array);
        $arrayabc = array_filter($arrayabc);
        print_r($array);
        $trimmed_array = array_map('trim', $array);
        $trimmed_arrayabc = array_map('trim', $arrayabc);
        // echo();
        function arraysearch($arra1, $search)
        {
            reset($arra1);
            while (list($key, $val) = each($arra1)) {
                if (preg_match("/$search/", $val)) {
                    echo $val."</br>";

                    echo $search." has found in ".$key."</br>";
                    return $key;
                }
            }
        }
        // $exercises = array("part1"=>"PHP array", "part2"=>"PHP String", "part3"=>"PHP Math");

        $search=arraysearch($trimmed_array, "main");

        $plag_count=0;
        $similarity = 0;
        ksort($trimmed_array);
        $str1 = array_values($trimmed_array);
        ksort($trimmed_arrayabc);
        $str2 = array_values($trimmed_arrayabc); // sorted by original key order

        $str1 = array_slice($str1, $search);
        $str2 = array_slice($str2, $search);
        $len1 = count($str1);
        $len2 = count($str2);
        unset($str1[$len1 -1]);
        unset($str1[$len1 -2]);
        unset($str2[$len2 -1]);
        unset($str2[$len2 -2]);
        $len1 = count($str1);
        $len2 = count($str2);
        print_r(array_keys($str1, '{'));
        print_r(array_keys($str1, '}'));
        function array_except($array, $keys)
        {
            return array_diff_key($array, array_flip((array) $keys));
        }
        $output = array_except($str1, array_keys($str1, '{'));
        $output = array_except($output, array_keys($str1, '}'));
        $outputabc = array_except($str2, array_keys($str2, '}'));
        $outputabc = array_except($outputabc, array_keys($str2, '{'));
        ksort($output);
        $output = array_values($output);
        ksort($outputabc);
        $outputabc = array_values($outputabc);


        // dd($output, $outputabc);
        // dd($str1, $str2);
        // print_r($array_with_new_keys);
        // dd($array_with_new_keys);
        // foreach ($str1 as $value) {
        //     echo "$value <br>";
        //     foreach ($str2 as $str) {
        //         // if (preg_match("/main/", $value)) {


        //         if ($value === $str) {
        //             $similarity++;
        //             //                 // array_push($a
        //             $current_seq = explode("\n", $value);
        //             //                 //   $current_seq = implode(" ", $str1[$i]);
        //             array_push($word_seq_history, $current_seq);
        //         }
        //         // }
        //     }
        // }
        // $word_seq_history = array();
        $cart = array();

        $similarity = 0;
        for ($i = 0; $i < count($output); $i++) {
            // echo $i."</br>";
            for ($j = 0; $j < count($outputabc); $j++) {
                // echo $j."</br>";
                // if (isset($str1[$i])) {
                //     // echo $str1[$i]."</br>";
                //     if ($i > 5) {
                //         if (isset($str2[$j])) {
                if ($output[$i] == $outputabc[$j]) {


                //                 // if (strcmp($str1[$i], $str2[$i]) == 0) {
                    //                 // echo 'ok';
                    //                 // echo $str1[$i]."</br>";
                    // echo $output[$i]."</br>";
                    //                 echo $j."</br>";
                    //                 // die();

                    $similarity++;
                    // //                 // array_push($a
                    // $current_seq = explode("\n", $output[$i]);
                    // print_r($current_seq)."</br>";
                    array_push($cart, htmlspecialchars($output[$i]));

                    // //                 //   $current_seq = implode(" ", $str1[$i]);
                    // array_push($word_seq_history, $current_seq);
                }
                //             // }

                //         //   echo $str2[$j]."</br>";
                // }
                //     }
                // }
            }
        }
        echo "</br>";
        echo($similarity / count($output)) * 100 . "<br>";
        print_r($cart)."<br>";
        dd($similarity, count($output), $output, $outputabc, 'pl');


















 // convert text to word by word
        // $filecontents = file_get_contents(public_path("error/main.cpp"));

        // $words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY);

        // $filecontentsabc = file_get_contents(public_path("error/test.cpp"));

        // $wordsabc = preg_split('/[\s]+/', $filecontentsabc, -1, PREG_SPLIT_NO_EMPTY);

        // print_r($words);
// end text to word by word














// line by line to array
  // line by line
        $fp = @fopen(public_path("error/Task01.txt"), 'r');

        // // Add each line to an array
        if ($fp) {
            $array = explode("\n", fread($fp, filesize(public_path("error/Task01.txt"))));
        }
        $jkkj = "";
        // echo implode(', ', $array);
        // print_r(array_filter($array));
        $array = array_filter($array);
        // print_r($array);


        $trimmed_array = array_map('trim', $array);
        print_r($trimmed_array);
        //  dd($trimmed_array);

        // now $a contains "HelloWorld!"
        $a = "";

        for ($i=0;$i<count($trimmed_array);$i++) {
            // echo "Index of ".$i."= ".$array[$i]."<br>";

            if (isset($trimmed_array[$i])) {
                echo "Index of ".$i."= ".htmlspecialchars($trimmed_array[$i])."<br>";

                $a .= htmlspecialchars($trimmed_array[$i]);

                $jkkj = implode(" ", $trimmed_array);
                // echo $jkkj;
            }
        }
        echo $a;
        //     foreach ($array as $key => $value) {
        //         // if(isset($array[$key])){
        //         //      $jkkj = implode(" ", $array[$value]);
        //         // }
        //         echo $jkkj;
        //        echo $value;
        //   }

        // $comma_separated = implode(" ", $array);
        // echo $comma_separated;

        dd($trimmed_array);
