<?php


namespace Service;

use Helper\CustomHelper;
use Repository\ClientRepository;
use wpdb;



class MenApplicationAdminUpdate
{

    /** Class constructor */
    private $clientRepository;
	const TABLE_MEN = 'wp_men';

    public function __construct()
    {

	    require_once '../Repository/ClientRepository.php';
	    $this->clientRepository = new ClientRepository();

    }

	public function MenUpdate($post)
	{
		$post = $this->validatePost($post);
		$first_key = key($post);

		if($first_key === 'error'){
			return ['error' => $post['error']];
		}

		$this->clientRepository->updateApplication(self::TABLE_MEN,$post);
		return ['success' => 'Анкета успешно обновлена'];
	}

	private function validatePost($post)
	{
		require_once '../Helper/CustomHelper.php';
		$post =  [
			'id' => CustomHelper::sanitiseText($post['me1-id']),
			'name' => CustomHelper::sanitiseText($post['me1-name']),
			'date_of_birth' => strtotime(CustomHelper::sanitiseText($post['me1-dateOfBirth'])),
			'email' => sanitize_email($post['me1-email']),
			'phone' => CustomHelper::sanitiseText($post['me1-phone']),
			'town' => CustomHelper::sanitiseText($post['me1-town']),
			'height' => CustomHelper::sanitiseText($post['me1-height']),
			'weight' => CustomHelper::sanitiseText($post['me1-weight']),
			'hair_color' => CustomHelper::sanitiseText($post['me1-heirColor']),
			'eye_color' => CustomHelper::sanitiseText($post['me1-eyeColor']),
			'education' => CustomHelper::sanitiseText($post['me1-education']),
			'profession' => CustomHelper::sanitiseText($post['me1-profession']),
			'eng_lang' => CustomHelper::sanitiseText($post['me1-enLanguage']),
			'foreign_lang' => CustomHelper::sanitiseText($post['me1-languages']),
			'family_status' => CustomHelper::sanitiseText($post['me1-familyStatus']),
			'kids' => CustomHelper::sanitiseText($post['me1-kids']),
			'about' => CustomHelper::sanitiseText($post['me1-about']),
			'hobby' => CustomHelper::sanitiseText($post['me1-hobby']),
			'smoking' => CustomHelper::sanitiseText($post['me1-smoking']),
			'drinking' => CustomHelper::sanitiseText($post['me1-drinking']),
			'people_value' => CustomHelper::sanitiseText($post['me1-people_value']),
			'parent_relations' => CustomHelper::sanitiseText($post['me1-parent_relations']),
			'music_preferences' => CustomHelper::sanitiseText($post['me1-music_preferences']),
			'literature' => CustomHelper::sanitiseText($post['me1-literature']),
			'principles' => CustomHelper::sanitiseText($post['me1-principles']),
			'goal' => CustomHelper::sanitiseText($post['me1-goal']),
			'cuisine' => CustomHelper::sanitiseText($post['me1-cuisine']),
			'socially_active' => CustomHelper::sanitiseText($post['me1-socially_active']),
			'vacation_preferences' => CustomHelper::sanitiseText($post['me1-vacation_preferences']),
			'partner_age_difference' => CustomHelper::sanitiseText($post['me1-partner_age_difference']),
			'partner_kids' => CustomHelper::sanitiseText($post['me1-partner_kids']),
			'partner_smoke' => CustomHelper::sanitiseText($post['me1-partner_smoke']),
			'partner_religion' => CustomHelper::sanitiseText($post['me1-partner_religion']),
			'partner_drive_away' => CustomHelper::sanitiseText($post['me1-partner_drive_away']),
			'partner_attraction' => CustomHelper::sanitiseText($post['me1-partner_attraction']),
			'path_to_images' => CustomHelper::sanitiseText($post['me1-path-to-images'])
		];

		return $post;
	}

}
