<?php

class model{
	
	private $DB='';
	
	public function __construct($DB){
		$this->DB = $DB;
    }
	
	public function show_program($rights){
		$result_program = $this->DB->get_record('program',['deleted'=>0]);
		switch ($rights) {
			case 'dir':
				$start_block='<textarea>';
				$end_block='</textarea>';
				$start_block_name='<textarea>';
				$end_block_name='</textarea>';
				break;
			case 'spec':
				$start_block='';
				$end_block='';
				$start_block_name='';
				$end_block_name='';
				break;
			case 'lec':
				$start_block='<textarea>';
				$end_block='</textarea>';
				$start_block_name='';
				$end_block_name='';
				break;
		}
		if($result_program->num_rows>0){
			do{
				$row_program = $result_program->fetch_array(MYSQLI_ASSOC);
				if(!is_null($row_program)){
					echo"<div class='row'>";
						echo"<div class='col-7 offset-1 h3'>";
							echo"<p>Образовательная программа ".$row_program['code']." «".$row_program['name']."»</p>";
							$result_discipline = $this->DB->get_record('discipline',['program_id'=>$row_program['id'],'deleted'=>0]);
							if($result_discipline->num_rows>0){
								echo"<table width=1220px>";
									echo"<tr>";
										echo"<td width=25% class='center'>";
											echo"Название";
										echo"</td>";
										echo"<td width=25% class='center'>";
											echo"Знания";
										echo"</td>";
										echo"<td width=25% class='center'>";
											echo"Умения";
										echo"</td>";
										echo"<td width=25% class='center'>";
											echo"Навыки";
										echo"</td>";
									echo"</tr>";
								echo"</table>";
								echo"<table width=1220px data-id=".$row_program['id']." id='table_".$row_program['id']."'>";
									do{
										$row_discipline = $result_discipline->fetch_array(MYSQLI_ASSOC);
										if(!is_null($row_discipline)){
											echo"<tr data-id=".$row_discipline['id'].">";
												echo"<td width=25%>";
													echo $start_block_name.$row_discipline['name'].$end_block_name;
												echo"</td>";
												echo"<td width=25%>";
													echo $start_block.$row_discipline['knowledge'].$end_block;
												echo"</td>";
												echo"<td width=25%>";
													echo $start_block.$row_discipline['ability'].$end_block;
												echo"</td>";
												echo"<td width=25%>";
													echo $start_block.$row_discipline['skill'].$end_block;
												echo"</td>";
											echo"</tr>";
										}
									}while (!is_null($row_discipline));
								echo"</table>";
							}else{
								echo"<div class='offset-1 h5'>";
									echo"<strong>В базе отсутсвуют дисциплины для данной программы</strong>";
									echo"<table data-id=".$row_program['id']." id='table_".$row_program['id']."'>";
									echo"</table>";
								echo"</div>";
							}
						echo"</div>";
					echo"</div>";
					if($rights == 'dir'){
						echo"<div class='row'>";
							echo"<div class='col-3 offset-5 h3'>";
								echo"<button class='btn btn-primary' onClick='Add_Discipline(".$row_program['id'].");'>Добавить дисциплину</button>";
							echo"</div>";
						echo"</div>";
					}
				}
			} while (!is_null($row_program));
		}else{
			echo"<div>";
				echo"В базе отсутсвуют образовательные программы";
			echo"</div>";
		}
	}
	
	public function show_edits($rights){
		$result_edits = $this->DB->get_record('edits',[]);
		if($result_edits->num_rows>0){
			do{
				$row_edit = $result_edits->fetch_array(MYSQLI_ASSOC);
				if(!is_null($row_edit)){
					$original = $this->DB->get_record('discipline',['id' => $row_edit['discipline_id']])->fetch_array(MYSQLI_ASSOC);
					echo"<div class='row h4'>";
						echo"<div class='col-2 offset-1'>";
							echo"Оригинал";
						echo"</div>";
						echo"<div class='col-2'>";
							echo $original['name'];
						echo"</div>";
						echo"<div class='col-2'>";
							echo $original['knowledge'];
						echo"</div>";
						echo"<div class='col-2'>";
							echo $original['ability'];
						echo"</div>";
						echo"<div class='col-2'>";
							echo $original['skill'];
						echo"</div>";
					echo"</div>";
					echo"<div class='row h4'>";
						echo"<div class='col-2 offset-1'>";
							echo"Правка";
						echo"</div>";
						echo"<div class='col-2'>";
							echo $row_edit['name'];
						echo"</div>";
						echo"<div class='col-2'>";
							echo $row_edit['knowledge'];
						echo"</div>";
						echo"<div class='col-2'>";
							echo $row_edit['ability'];
						echo"</div>";
						echo"<div class='col-2'>";
							echo $row_edit['skill'];
						echo"</div>";
					echo"</div>";
					echo"<div class='row'>";
						echo"<div class='col-2 offset-2'>";
							echo"<button class='btn btn-danger' onClick='Discard_Edit(".$row_edit['id'].");'>Отменить правку</button>";
						echo"</div>";
						if($rights == 'dir'){
							echo"<div class='col-2'>";
							echo"<button class='btn btn-success' onClick='Apply_Edit(".$row_edit['id'].");'>Применить правку</button>";
						echo"</div>";
						}
					echo"</div>";
				}
			} while (!is_null($row_edit));
		}
	}
}