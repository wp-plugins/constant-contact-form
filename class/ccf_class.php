<?php

/**
 *     constant contact form
 *     Copyright (C) 2011  www.gopiplus.com
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class ConstantContact 
{

    var $add_subscriber_url = "http://ccprod.roving.com/roving/wdk/API_AddSiteVisitor.jsp";
    var $remove_subscriber_url = 'http://ccprod.roving.com/roving/wdk/API_UnsubscribeSiteVisitor.jsp';
    var $_username = '';
    var $_password = '';
    var $_category = '';
	
    function setUsername($username)
    {
        $this->username = $username;
    }
	
    function setPassword($password)
    {
        $this->password = $password;
    }
	
    function setCategory($category)
    {
        $this->category = $category;
    }
	
    function getUsername()
    {
        return urlencode($this->username);
    }
	
    function getPassword()
    {
        return urlencode($this->password);
    }
	
    function getCategory()
    {
        return urlencode($this->category);
    }
	
    function add($email, $extra_fields = array())
    {
        $email = urlencode(strip_tags($email));
        
        $data = 'loginName=' . $this->getUsername();
        $data .= '&loginPassword=' . $this->getPassword();
        $data .= '&ea=' . $email;
        $data .= '&ic=' . $this->getCategory();
		
		if(is_array($extra_fields)):
		    foreach($extra_fields as $k => $v):
                $data .= "&" . urlencode(strip_tags($k)) . "=" . urlencode(strip_tags($v));
		    endforeach;
        endif;
		
        return $this->_send($data, $this->add_subscriber_url);
    }
	
    function remove($email)
    {
        $email = urlencode(strip_tags($email));
        
        $data = 'loginName=' . $this->getUsername();
        $data .= '&loginPassword=' . $this->getPassword();
        $data .= '&ea=' . $email;
        
        return $this->_send($data, $this->remove_subscriber_url);
    }
	
    function _send($data, $url)
    {
        $handle = fopen("$url?$data", "rb");
        $contents = '';
		
        while (!feof($handle)) {
            $contents .= fread($handle, 192);
        }
		
        fclose($handle);
		
		if(trim($contents) == 0):
			return true;
		endif;
		
		return false;
    }
}
?>