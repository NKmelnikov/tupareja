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
			'country' => CustomHelper::sanitiseText($post['me1-country']),
			'town' => CustomHelper::sanitiseText($post['me1-town'])
		];

		return $post;
	}

}
