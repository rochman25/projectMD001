//Copyright 2015 Pareto Software, LLC, released under an MIT license: http://opensource.org/licenses/MIT
$( document ).ready(function() {
		var testimonial_ok=false;
		//Inputs that determine what fields to show
		var anggota1 = $('#live_form input:radio[name=anggota1]');
		var anggota2 = $('#live_form input:radio[name=anggota2]');
		var testimonial=$('#live_form input:radio[name=testimonial]');				
		//var 
		//Wrappers for all fields
		var nidn1 = $('#live_form select[id="nidn"]').parent();
		var nidn2 = $('#live_form select[id="nidn2"]').parent();
		var ok = $('#live_form textarea[name="feedback_ok"]').parent();
		var great = $('#live_form textarea[name="feedback_great"]').parent();
		var nondosen1 = $('#live_form #div_anggota1');
		var nondosen2 = $('#live_form #div_anggota2');
		var btn_simpan = $('#live_form #div_sub');
		var btn_simpanmhs = $('#live_form #div_sub_mhs');
		var thanks_anyway  = $('#live_form #thanks_anyway');
		var all=nidn1.add(ok).add(nondosen1).add(btn_simpan).add(btn_simpanmhs);
		var all2=nidn2.add(ok).add(nondosen2).add(btn_simpan);
		
		anggota1.change(function(){
			var value=this.value;						
			all.addClass('hidden'); //hide everything and reveal as needed
			if (value == 'Dosen1'){
				nidn1.removeClass('hidden');
				btn_simpan.removeClass('hidden');								
			}
			else if (value == 'Mahasiswa1'){
				nondosen1.removeClass('hidden');
				btn_simpanmhs.removeClass('hidden');
			}
		});	

		anggota2.change(function(){
			var value=this.value;
			all2.addClass('hidden');
			if(value == 'Dosen2'){
				nidn2.removeClass('hidden');
			}
			else if(value == 'Mahasiswa2'){
				nondosen2.removeClass('hidden');
			}
		});

		
		testimonial.change(function(){
			all.addClass('hidden'); 
			testimonial_parent.removeClass('hidden');
		
			testimonial_ok=this.value;
			
			if (testimonial_ok == 'yes'){
				great.removeClass('hidden');
			}
			else{
				thanks_anyway.removeClass('hidden');
			}
			
		});
});
