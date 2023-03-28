function Add_Discipline(id){
	block = '';
	block+="<tr>";
		block+="<td>";
			block+="<textarea placeholder='Название'></textarea>";
		block+="</td>";
		block+="<td>";
			block+="<textarea placeholder='Знания'></textarea>";
		block+="</td>";
		block+="<td>";
			block+="<textarea placeholder='Умения'></textarea>";
		block+="</td>";
		block+="<td>";
			block+="<textarea placeholder='Навыки'></textarea>";
		block+="</td>";
	block+="</tr>";
	document.getElementById('table_'+id).innerHTML+=block;
}

function Save(){
	tables = document.getElementsByTagName('table');
	for (let table of tables) {
		program_id = table.dataset.id;
		if(program_id === undefined){
		}else{
			rows = table.getElementsByTagName('tr');
			for (let row of rows) {
				if(row.dataset.id != undefined){
					discipline_id = row.dataset.id;
				}else{
					discipline_id = -1;
				}
				columns = row.getElementsByTagName('td');
				name = columns[0].getElementsByTagName('textarea')[0].value;
				knowledge = columns[1].getElementsByTagName('textarea')[0].value;
				ability = columns[2].getElementsByTagName('textarea')[0].value;
				skill = columns[3].getElementsByTagName('textarea')[0].value;
				if(discipline_id>0){
					$.ajax({
						url: 'update_discipline.php',
						method: 'post',
						data: {name: name, knowledge: knowledge, ability: ability, skill: skill, discipline_id:discipline_id},
						success: function(response){
							location.reload();
						}
					});
				}else{
					$.ajax({
						url: 'add_discipline.php',
						method: 'post',
						data: {name: name, knowledge: knowledge, ability: ability, skill: skill, program_id:program_id},
						success: function(response){
							location.reload();
						}
					});
				}
			};
		}
	};
}

function Discard(){
	location.reload();
}

function Save_Edits(){
	tables = document.getElementsByTagName('table');
	for (let table of tables) {
		rows = table.getElementsByTagName('tr');
		for (let row of rows) {
			if(row.dataset.upd == 1){
				columns = row.getElementsByTagName('td');
				discipline_id = row.dataset.id;
				name = columns[0].innerHTML;
				knowledge = columns[1].getElementsByTagName('textarea')[0].value;
				ability = columns[2].getElementsByTagName('textarea')[0].value;
				skill = columns[3].getElementsByTagName('textarea')[0].value;
				$.ajax({
					url: 'add_edits.php',
					method: 'post',
					data: {name: name, knowledge: knowledge, ability: ability, skill: skill, discipline_id:discipline_id},
					success: function(response){
						location.reload();
					}
				});
			}
		};
	};
}

function Discard_Edit(id){
	$.ajax({
		url: 'delete_edits.php',
		method: 'post',
		data: {id: id},
		success: function(response){
			location.reload();
		}
	});
}

function Apply_Edit(id){
	$.ajax({
		url: 'apply_edits.php',
		method: 'post',
		data: {id: id},
		success: function(response){
			location.reload();
		}
	});
}

$( "textarea" ).change(function() {
  this.innerHTML = this.value;
  this.parentElement.parentElement.dataset.upd = 1;
});