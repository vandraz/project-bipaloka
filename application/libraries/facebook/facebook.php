
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
// Autoload the required files
require_once( APPPATH . 'vendor/facebook/php-sdk-v4/autoload.php' );
 
// Make sure to load the Facebook SDK for PHP via composer or manually
 
class Facebook {
  var $ci;
  var $accessToken;
  var $fb;
 
  public function __construct() {
    // Get CI object.
    $this->ci =& get_instance();
 
    $this->fb = new \Facebook\Facebook([
      'app_id' => $this->ci->config->item('app_secret', 'api_id'),
      'app_secret' => $this->ci->config->item('app_secret', 'facebook'),
      'default_graph_version' => 'v2.10',
      //'default_access_token' => '{access-token}', // optional
    ]);
  }
 
  /**
   * Get FB session.
   */
  public function get_access_token() {
    $helper = $this->fb->getRedirectLoginHelper();
 
    try { 
      $this->accessToken = $helper->getAccessToken(); 
    } catch( Facebook\Exceptions\FacebookResponseException $e ) { 
      // When Graph returns an error 
      echo 'Graph returned an error: ' . $e->getMessage(); 
      exit; 
    } catch( Facebook\Exceptions\FacebookSDKException $e ) { 
      // When validation fails or other local issues 
      echo 'Facebook SDK returned an error: ' . $e->getMessage(); 
      exit; 
    } 
  }
 
  /**
   * Login functionality.
   */
  public function login() {
    $this->get_access_token();
    if ( $this->accessToken ) {
      $this->ci->session->set_userdata( 'fb_token', $this->accessToken );
 
      $user = $this->get_user();
 
      if ( $user && !empty( $user->getProperty( 'email' ) ) ) {
         $result = $this->ci->user_model->get_user( $user->getProperty( 'email' ) );
 
          if ( ! $result ) {
            // Not registered.
            $this->ci->session->set_flashdata( 'fb_user', $user );
            redirect( base_url( 'register' ) );
          } else {
            if ( $this->ci->user_model->sign_in( $result->username, $result->password ) ) {
              redirect( base_url( 'home' ) );
            } else {
              die( 'ERROR' );
              redirect( base_url( 'login' ) );
            }
          }
      } else {
        die( 'ERROR' );
      }
    }
  }
 
  /**
   * Returns the login URL.
   */
  public function login_url() {
    $helper = $this->fb->getRedirectLoginHelper();
 
    return $helper->getLoginUrl( $this->ci->config->item( 'callback', 'facebook' ), $this->ci->config->item( 'permissions', 'facebook' ) );
  }
 
  /**
   * Returns the current user's info as an array.
   */
  public function get_user() {
    $user = false;
 
    $this->get_access_token();
    if ( $this->get_access_token ) {
      try {
        // Get the Facebook\GraphNodes\GraphUser object for the current user.
        // If you provided a 'default_access_token', the '{access-token}' is optional.
        $response = $this->fb->get( '/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $this->get_access_token );
      } catch( Facebook\Exceptions\FacebookResponseException $e ) {
        // When Graph returns an error
        echo 'ERROR: Graph ' . $e->getMessage();
        exit;
      } catch( Facebook\Exceptions\FacebookSDKException $e ) {
        // When validation fails or other local issues
        echo 'ERROR: validation fails ' . $e->getMessage();
        exit;
      }
    }
     
    return $response->getGraphUser();
  }
 
  /**
   * Get user's profile picture.
   */
  public function get_profile_pic( $user_id ) {
    $user = $this->get_user();
 
    if ( $user ) {
      $fbID = $me->getProperty( 'id' );
 
      return '//graph.facebook.com/' . $fbID . '/picture?type=large';
    }
 
    return false;
  }
}

