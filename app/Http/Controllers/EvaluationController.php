<?php
/**
 * Created by PhpStorm.
 * User: wdmzj
 * Date: 2016/9/15
 * Time: 11:52
 */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluationController extends Controller
{

    //判断用户目前测评进行状态并返回页数
    //显示页面
    public function showIndex(){

        return view('evaluation.index');
		// session_start();
		
		// $_SESSION['username'] = "Tony";
		// $_SESSION['userid'] = "1";

		// $results[][] = array();
		// //查询用户的测试记录
		// $results = DB::select("SELECT id FROM finderway_test_status WHERE test_name = 'mbti' AND user_id = ?"
		// 	,[$_SESSION['userid']]);
		// //测试记录的条数和对应的状态
		// $count = count($results);
		// //-1为未测评状态，0未正在测评（或测评中断状态），1为已经完成测评
		// if($count == 0){
		// 	$status = "-1";
		// }else if($count == 60){
		// 	$status = "1";
		// }else{
		// 	$status = "0";
		// }
		// var_dump($status);


    }

    //点击下一页时存入数据
    public function submitAnswers(){
    	session_start();		
		$_SESSION['username'] = "Tony";
		$_SESSION['userid'] = "1";
    	$data = array(
    						0 => 1,
    						1 => 0,
    						2 => 1,
    						3 => 1,
    						4 => 0,
    						5 => 0,
    						6 => 1,
    						7 => 1,
    						8 => 0,
    						9 => 1,
    						10 => 1,
    						11 => 0,
    						12 => 1,
    						13 => 1,
    						14 => 0,
    						15 => 0,
    						16 => 0,
    						17 => 0,
    						18 => 1,
    						19 => 1
    	);

    	//var_dump($data);
    	$counts = count($data);
    	$resp = 0;
    	for($i=0;$i<5;$i++){
	 		$result = DB::insert('INSERT INTO finderway_test_status (test_name, user_id, question_number,answer) values ("mbti",?, ?, ?)', [$_SESSION['username'], ($counts-4+$i), $data[$counts-5+$i]]); 
	 		if($result!=true){
	 			$resp++;
	 		}  		
    	}
    	if($resp==0){
    		return array(
    				'counts' => $counts/5,
    				'data'   => $data
    			);
    	}else{
    		return "false";
    	}
    }


    //计算测试结果
	// ajaxreturn 返回性格类型的主要特征
	// $info(array) -> mbti(string)
	// 			 	-> trait(string)
	// 			 	-> jobtypes(array) -> [0] (string) 点击$jobtype可跳转到（Job/JobIntroduction/index/$jobtype）
	// 							       -> [1] (string)
	// 								......
 	public function testResult(){
 		    	$data = array(
    						0 => 1,
    						1 => 0,
    						2 => 1,
    						3 => 1,
    						4 => 0,
    						5 => 0,
    						6 => 1,
    						7 => 1,
    						8 => 0,
    						9 => 1,
    						10 => 1,
    						11 => 0,
    						12 => 1,
    						13 => 1,
    						14 => 0,
    						15 => 0,
    						16 => 0,
    						17 => 0,
    						18 => 1,
    						19 => 1,
    						20 => 1,
    						21 => 0,
    						22 => 1,
    						23 => 1,
    						24 => 0,
    						25 => 0,
    						26 => 1,
    						27 => 1,
    						28 => 0,
    						29 => 1,
    						30 => 1,
    						31 => 0,
    						32 => 1,
    						33 => 1,
    						34 => 0,
    						35 => 0,
    						36 => 1,
    						37 => 1,
    						38 => 0,
    						39 => 1,
    						40 => 1,
    						41 => 0,
    						42 => 1,
    						43 => 1,
    						44 => 0,
    						45 => 0,
    						46 => 1,
    						47 => 1,
    						48 => 0,
    						49 => 1,
    						50 => 1,
    						51 => 0,
    						52 => 1,
    						53 => 1,
    						54 => 0,
    						55 => 0,
    						56 => 1,
    						57 => 1,
    						58 => 0,
    						59 => 1
    			);
 		    	$counts = count($data);
 		    	var_dump($counts);
 		    	$score = array(
	 		    	'R' => 0,
	 		    	'I' => 0,
	 		    	'A' => 0,
	 		    	'S' => 0,
	 		    	'E' => 0,
	 		    	'C' => 0
 		    	);
 		    	for($i=1;$i<61;$i++){
 		    		//R：现实型（Realistic）
 		    		if($i==2||$i==13||$i==22||$i==36||$i==43){
 		    			if($data[$i-1]==0){
 		    		    	$score['R'] = $score['R'] + 1;				
 		    			}
 		    		}else if($i==14||$i==23||$i==44||$i==47||$i==48){
 		    			if($data[$i-1]==1){
 		    		    	$score['R'] = $score['R'] + 1;				
 		    			}
 		    		//I：研究型（Investigative） 	
 		    		}else if($i==6||$i==8||$i==20||$i==30||$i==31||$i==42){
 		    			if($data[$i-1]==0){
 		    		    	$score['I'] = $score['I'] + 1;				
 		    			}
 		    		}else if($i==21||$i==55||$i==56||$i==58){
 		    			if($data[$i-1]==1){
 		    		    	$score['I'] = $score['I'] + 1;				
 		    			}
 		    		//A：艺术型（Artistic）
 		    		}else if($i==4||$i==9||$i==10||$i==17||$i==33||$i==34||$i==49||$i==50||$i==54){
 		    			if($data[$i-1]==0){
 		    		    	$score['A'] = $score['A'] + 1;				
 		    			}
 		    		}else if($i==32){
 		    			if($data[$i-1]==1){
 		    		    	$score['A'] = $score['A'] + 1;				
 		    			}
 		    		//S：社会型（Social）
 		    		}else if($i==26||$i==37||$i==52||$i==59){
 		    			if($data[$i-1]==0){
 		    		    	$score['S'] = $score['S'] + 1;				
 		    			}
 		    		}else if($i==1||$i==12||$i==15||$i==27||$i==45||$i==53){
 		    			if($data[$i-1]==1){
 		    		    	$score['S'] = $score['S'] + 1;				
 		    			}
 		    		//E：企业型（Enterprise）
 		    		}else if($i==11||$i==24||$i==28||$i==35||$i==38||$i==46||$i==60){
 		    			if($data[$i-1]==0){
 		    		    	$score['E'] = $score['E'] + 1;				
 		    			}
 		    		}else if($i==3||$i==16||$i==25){
 		    			if($data[$i-1]==1){
 		    		    	$score['E'] = $score['E'] + 1;				
 		    			}
 		    		//C：传统型（Conventional）
 		    		}else if($i==7||$i==19||$i==29||$i==39||$i==41||$i==51||$i==57){
 		    			if($data[$i-1]==0){
 		    		    	$score['C'] = $score['C'] + 1;				
 		    			}
 		    		}else if($i==5||$i==18||$i==40){
 		    			if($data[$i-1]==1){
 		    		    	$score['C'] = $score['C'] + 1;				
 		    			}
 		    		}
 		    	}
 		    	var_dump($score);
 	}

}