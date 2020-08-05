<?php
class Auth extends CI_Controller
{
	public function __contruct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
    {
			if ($this->session->userdata('email')){
				redirect('home');
			}

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Email salah']);
			$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password tidak boleh kosong']);

			if ($this->form_validation->run() == false) {
				$this->load->view('Admin/Tamplat/Auth/Login');
			} else {
				// validasi berhasil
				$this->_login();
			}
    }

		private function _login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email'=>$email])->row_array();

			if($user) {
				if($user['is_active'] == 1) {
					// cek password
					if(password_verify($password, $user['password'])) {
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);
						if($user['role_id'] == 1){
							redirect('admin');
						}else {
							redirect('home');
						}
					} else {
						$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Password salah!</div>' );
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Actifasi email kamu!</div>' );
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Email kamu belum terdaftar!</div>' );
        redirect('auth');
			}
		}

    public function Register()
    {
			if ($this->session->userdata('email')){
				redirect('home');
			}

    	$this->form_validation->set_rules('nama', 'Username', 'required|trim', [
			'required' => 'Username tidak boleh kosong'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
				'required' => 'Email tidak boleh kosong'
			]);
			$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[6]|matches[password2]', [
				'required' => 'passwoard tidak boleh kosong',
				'matches' => 'passwoard tidak sama',
				'min_length' => 'paswoard minimal 6'
			]);
			$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]', [
				'required' => 'passwoard tidak boleh kosong'
			]);


			if ($this->form_validation->run() == false) {
				$data['title'] = 'Buat Akun';
				$this->load->view('Admin/Tamplat/Auth/Register', $data);
			} else {
				$email = $this->input->post('email', true);
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'email' => htmlspecialchars($email),
					'gambar' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 0,
					'date_created' => time()
				];

				// data token
				$token = base64_encode(random_bytes(32));
				$user_token = [
						'email' => $email,
						'token' => $token,
						'date_created' => time()
				];

				$this->db->insert('user', $data);
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'verify');
				$this->session->set_flashdata('massage', '<div class="alert alert-primary" role="alert"> Berhasil Daftar! check email kamu untuk melakukan activasi kurun waktu 24 jam</div>' );
				redirect('auth');
			}
	   }
		 private function _sendEmail($token, $type)
		 {
			 $config = [
				 		'protocol' 	=> 'smtp',
				 		'smtp_host' => 'ssl://smtp.googlemail.com',
				 		'smtp_user' => 'hariprogrammer2020@gmail.com',
				 		'smtp_pass' => 'kirangterang',
				 		'smtp_port' => 465,
				 		'mailtype' 	=> 'html',
				 		'charset'		=> 'utf-8',
				 		'newline' 	=> "\r\n"
				 ];

				 $this->email->initialize($config);

				 $this->email->from('hariprogrammer2020@gmail.com', 'Hari Programmer');
				 $this->email->to($this->input->post('email'));

				 if ($type == 'verify'){
					 $this->email->subject('Account verifikasi');
					 $this->email->message('klick untuk activasi : <a href="'.base_url(). 'auth/verify?email='. $this->input->post('email'). '&token='. urlencode($token).'">Activasi</a>');
				 } else if ($type == 'forgot') {
					 	$this->email->subject('Reset paswoard');
						$this->email->message('klick untuk Reset paswoard : <a href="'.base_url(). 'auth/resetpassword?email='. $this->input->post('email'). '&token='. urlencode($token).'">Reset password</a>');
				 }


				 if ($this->email->send()) {
					 return true;
				 }else {
				 	echo $this->email->print_debugger();
					die;
				 }

		 }

		 public function verify()
		 {
			 $email = $this->input->get('email');
			 $token = $this->input->get('token');

			 $user = $this->db->get_where('user', ['email' => $email])->row_array();

			 if($user) {
				 $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

				 if($user_token) {

					 if(time() - $user_token['date_created'] < (60*60*24)){
						 $this->db->set('is_active', 1);
						 $this->db->where('email', $email);
						 $this->db->update('user',);

						 $this->db->delete('user_token', ['email' => $email]);
						 $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">'. $email .' telah teractivasi! Silahkan Login</div>' );
	    			 redirect('auth');
					 }else {
						 $this->db->delete('user' , ['email' => $email]);
						 $this->db->delete('user_token' , ['email' => $email]);

						 $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">account activasi gagal! token kedaluarsa</div>' );
	    			 redirect('auth');
					 }
				 } else {
					 $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">account activasi gagal! token tidak ada</div>' );
    			 redirect('auth');
				 }
			 } else {
				 $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">account activasi gagal! email tidak ada</div>' );
  			 redirect('auth');
			 }
		 }

		 public function logout()
		 {
			 $this->session->unset_userdata('email');
			 $this->session->unset_userdata('role_id');

			 $this->session->set_flashdata('massage', '<div class="alert alert-primary" role="alert"> Berhasil logout!</div>' );
			 redirect('auth');
		 }

		 public function blocked()
		 {
			 $this->load->view('admin/tamplat/auth/blocked');
		 }

		 // lupa password
		 public function lupafw()
		 {
			 $data['title'] = 'Lupa Password';

			 	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email tidak boleh kosong', 'valid_ema il' => 'Email salah']);
			 if ($this->form_validation->run() == false){
				 $this->load->view('admin/tamplat/auth/lupafw', $data);
			 } else {
				 	$email 	= $this->input->post('email');
					$user 	= $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

					if ($user){
							$token = base64_encode(random_bytes(32));
							$user_token = [
									'email' 				=> $email,
									'token' 				=> $token,
									'date_created' 	=> time()
							];

							$this->db->insert('user_token', $user_token );
							$this->_sendEmail($token, 'forgot');
							$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Cek Email untuk Reset Password!</div>' );
							redirect('auth/lupafw');
					} else {
						$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">	Email Belum Terdaftar! dan Belum Ter-activasi!</div>' );
						redirect('auth/lupafw');
					}
			 }
		 }

		 public function resetpassword()
		 {
			 $email = $this->input->get('email');
			 $token = $this->input->get('token');

			 $user = $this->db->get_where('user', ['email' => $email])->row_array();

			 if($user) {
				 	$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
					if ($user_token){
						$this->session->set_userdata('reset_email', $email);
						$this->changepassword();
					} else {
						$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Reset password gagal! Token tidak ada!</div>' );
	  				redirect('auth');
					}
			 } else {
				 	$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Reset password gagal! email tidak ada!</div>' );
 					redirect('auth');
			 }
		 }

		 public function changepassword()
		 {
			 	if(!$this->session->userdata('reset_email')){
					redirect('auth');
				}

			 	$data['title'] = 'Perbaiki password';

				$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[6]|matches[password2]', [
					'required' 		=> 'passwoard tidak boleh kosong',
					'matches' 		=> 'passwoard tidak sama',
					'min_length' 	=> 'paswoard minimal 6'
				]);
				$this->form_validation->set_rules('password2', 'password', 'required|trim|min_length[6]|matches[password1]', [
					'required' 		=> 'passwoard tidak boleh kosong',
					'matches' 		=> 'passwoard tidak sama',
					'min_length' 	=> 'paswoard minimal 6'
				]);

				if ($this->form_validation->run() == false) {
			  $this->load->view('admin/tamplat/auth/change_password', $data);
			} else {
				$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->unset_userdata('reset_email');

				$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Password berhasil di reset! Silahkan login!</div>' );
				redirect('auth');
			}
		 }
		 // end lupa pssword
}
