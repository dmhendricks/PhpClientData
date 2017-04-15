<?php
namespace TwoLab\PhpClientData;

/**
 * Simple PHP/JavaScript classes that make client-side JavaScript data available to PHP.
 *
 * Usage:
 *    $client = new TwoLab\PhpClientData\Client();
 *    $clientData = $client->data;
 *    var_dump($clientData);
 *
 * @author  Daniel M. Hendricks
 * @version 0.1.0
 * @since   0.1.0
 * @link    https://github.com/dmhendricks/php-client-data
 * @license https://opensource.org/licenses/GPL-2.0 GPL-2.0
 */

class Client {

  /**
   * This holds the client data
   * @var string
   */
   public $data;

   /**
    * This variable stores the name of the cookie to be used to store the data
    * @var string
    */
   private $cookieName = 'remote_client_data';

  /**
   * Class constructor
   *
   * @param string $altCookieName (optional) Key name of the cookie where the
   *    data will be stored.
   * @return object Contains the decoded JSON object passed through the cookie.
   */
  public function __construct($altCookieName = null)
  {
    $this->cookieName = $altCookieName ?: $this->cookieName;
    $this->data = isset($_COOKIE[$this->cookieName]) ? json_decode($_COOKIE[$this->cookieName]) : null;
    return $this->data;
  }

  /**
   * Object to JSON
   * @return string Return client data object as JSON
   */
  public function toJSON()
  {
    return '<pre>'.json_encode($this->data).'</pre>';
  }

  /**
   * Get the cookie variable name
   * @param bool Whether or not to escape the cookie name (required when injected)
   *    into JavaScript code that uses single quotes for strings.
   * @return string The name of the cookie/key where the object data will be stored.
   */
  public function getCookieName($escape = false)
  {
    return $escape ? str_replace("'", "\'", $this->cookieName) : $this->cookieName;
  }

  /**
   * __toString() magic method
   * @return string Returns the result of a var_dump() on the object in string
   *    format.
   */
  public function __toString()
  {
    ob_start();
    var_dump($this->data);
    return ob_get_clean();
  }

}
?>
