<?php defined('SYSPATH') or die('No direct script access.');

/**
 * User model
 */
class Model_User extends Model_A1_User_Sprig
	implements Acl_Role_Interface, Acl_Resource_Interface {

	/**
	 * Setup Sprig fields
	 */
	public function _init() {
		parent::_init();

		$this->_fields += array(
			'id' => new Sprig_Field_Auto,
			'password_confirm' => new Sprig_Field_Password(array(
				'empty'     => TRUE,
				'hash_with' => NULL,
				'in_db'     => FALSE,
				'rules'     => array(
					'matches' => array('password'),
				),
			)),
			'email' => new Sprig_Field_Email(array(
				'unique'     => TRUE,
				'max_length' => 64,
			)),
			'role' => new Sprig_Field_Char(array(
				'choices' => array(
					'user'  => 'User',
					'admin' => 'Admin',
				),
			)),
			'logins' => new Sprig_Field_Integer(array(
				'default'  => 0,
				'editable' => FALSE,
			)),
			'last_login' => new Sprig_Field_Timestamp(array(
				'editable' => FALSE,
			)),
		);

		// Add format rules/filters
		$this->_fields['username']->filters = array('trim' => NULL);
		$this->_fields['username']->rules   = array(
			'regex' => array('/^[\pL_.-]+$/ui'),
		);
		$this->_fields['password']->filters = array('trim' => NULL);
	}

	/**
	 * Print username
	 */
	public function __toString() {
		// If the model has not yet been loaded, load it
		if ($this->state() == 'new' OR $this->state() == 'loading')
		{
			$this->load();
		}

		if ($this->loaded())
			return $this->_original['username'];
		else
			return parent::__toString();
	}

	/**
	 * Acl_Role_Interface implementation of get_role_id
	 *
	 * @return  string
	 */
	public function get_role_id() {
		return $this->role;
	}

	/**
	 * Acl_Resource_Interface implementation of get_resource_id
	 *
	 * @return  string
	 */
	public function get_resource_id() {
		return 'user';
	}

}	// End of Model_User
