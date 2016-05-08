<?php
use App\Colleges;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CollegeSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Colleges::create([
							'name' => 'All Hallows College',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Athlone Institute of Technology',
							'county' => 'Athlone' 
						]);
		Colleges::create([
							'name' => 'Carlow College',
							'county' => 'Carlow' 
						]);
		Colleges::create([
							'name' => 'Cork Institute of Technology',
							'county' => 'Cork' 
						]);
		Colleges::create([
							'name' => 'Dublin City University',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Dublin Institute of Technology',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Dún Laoghaire Institute of Art, Design and Technology',
							'county' =>  'Dublin' 
						]);
		Colleges::create([
							'name' => 'Dundalk Institute of Technology',
							'county' => 'Louth' 
						]);
		Colleges::create([
							'name' => 'Galway-Mayo Institute of Technology',
							'county' => 'Galway' 
						]);
		Colleges::create([
							'name' => 'Institute of Public Administration',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Institute of Technology Carlow',
							'county' => 'Carlow' 
						]);
		Colleges::create([
							'name' => 'Institute of Technology Sligo',
							'county' => 'Sligo' 
						]);
		Colleges::create([
							'name' => 'Institute of Technology Tallaght',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Institute of Technology, Blanchardstown',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Institute of Technology, Tralee',
							'county' => 'Tralee' 
						]);
		Colleges::create([
							'name' => 'Letterkenny Institute of Technology',
							'county' => 'Donegal' 
						]);
		Colleges::create([
							'name' => 'Limerick Institute of Technology',
							'county' => 'Limerick' 
						]);
		Colleges::create([
							'name' => 'Marino Institute of Education',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'National College of Art and Design',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'National College of Ireland',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'National University of Ireland, Galway',
							'county' => 'Galway' 
						]);
		Colleges::create([
							'name' => 'National University of Ireland, Maynooth',
							'county' => 'Kildare' 
						]);
		Colleges::create([
							'name' => 'National University of Ireland, System',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Royal College of Surgeons in Ireland',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Royal Irish Academy of Music',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'Saint Patrick\'s College, Maynooth',
							'county' => 'Kildare' 
						]);
		Colleges::create([
							'name' => 'Shannon College of Hotel Management',
							'county' => 'Clare' 
						]);
		Colleges::create([
							'name' => 'Trinity College Dublin, University of Dublin',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'University College Cork',
							'county' => 'Cork' 
						]);
		Colleges::create([
							'name' => 'University College Dublin',
							'county' => 'Dublin' 
						]);
		Colleges::create([
							'name' => 'University of Limerick',
							'county' => 'Limerick' 
						]);
		Colleges::create([
							'name' => 'Waterford Institute of Technology',
							'county' => 'Waterford' 
						]);
		Colleges::create([
							'name' => 'Griffith College',
							'county' => 'Cork' 
						]);
		Colleges::create([
							'name' => 'Coláiste Stiofáin Naofa',
							'county' => 'Cork' 
						]);
	}

}
