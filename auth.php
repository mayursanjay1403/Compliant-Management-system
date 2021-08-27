<?php
 require_once 'config.php';
 class Auth extends Database
 {
     public  function register($name,$email,$password)
     {
         $sql="INSERT INTO users(name,email,password)
         VALUES('$name','$email','$password')";
         $this->db->query($sql);
        
         return true;
     }


    //check the user already exist
    public function user_exist($email)
    {
        $sql="SELECT email FROM users WHERE email='$email'";
        $rs=$this->db->query($sql);
        $result=$rs->fetch_assoc();
        return $result;
    }

    //existing user
    public function login($email)
    {
        $sql="SELECT email,password FROM users WHERE email='$email' AND deleted !=0";
        $query=$this->db->query($sql);
        $row=$query->fetch_assoc();
        return $row;
    }
    //current user in the session

    public function currentUser($email)
    {
        $sql="SELECT * FROM users WHERE email='$email' AND deleted!=0";
        $query=$this->db->query($sql);
        $row=$query->fetch_assoc();
        return $row;
    }
    //Forgot password
    public function forgot_password($token,$email)
    {
        $sql="UPDATE  users SET token='$token',token_expire=DATE_ADD(NOW(),INTERVAL 10 MINUTE) WHERE email='$email'";
        $query=$this->db->qeury($sql);
        return true;
    }
    //add new note

    public function add_new_note($uid,$title,$note)
    {
        $sql="INSERT INTO notes(uid,title,note) VALUES('$uid','$title','$note')";
        $query=$this->db->query($sql);
        return true;
    }
//fetch all note of an user
    public function get_notes($uid)
    {
        $sql="SELECT * FROM notes WHERE uid='$uid'";
        $query=$this->db->query($sql);
        return $query;
    }
    //return no of rows
    public function get_rows($uid)
    {
        $sql="SELECT * FROM notes WHERE uid='$uid'";
        $query=$this->db->query($sql);
        $result=$query->num_rows;
        return $result;
    }
    // selected row of notes
    public function edit_note($id)
    {
        $sql="SELECT * FROM notes WHERE id='$id'";
        $query=$this->db->query($sql);
        $result=$query->fetch_assoc();
        return $result;
    } 
   //edit selected row
   public function update_notes($id,$title,$note)
   {
       $sql="UPDATE notes SET title='$title',note='$note',updated_at=NOW() WHERE id='$id'";
       $query=$this->db->query($sql);
       return true;
   }
   //delete particular note
   public function delete_notes($id)
   {
       $sql="DELETE FROM notes WHERE  id='$id'";
       $query=$this->db->query($sql);
       return true;
   } 
   //update profile of an user
  public function update_profile($name,$gender,$dob,$phone,$photo,$id)
  {
      $sql="UPDATE users SET name='$name',gender='$gender',dob='$dob',phone='$phone',photo='$photo' WHERE id='$id' AND deleted!=0";
      $query=$this->db->query($sql);
      return true;
  }
  //change password of an user
  public function change_password($pass,$id)
  {
      $sql="UPDATE users SET password='$pass' WHERE id='$id'";
      $query=$this->db->query($sql);
      return true;
  }
  //send feedback
  public function send_feedback($id,$sub,$feed) 
  {
      $sql="INSERT INTO feedback(uid,subject,feedback) VALUES('$id','$sub','$feed')";
      $query=$this->db->query($sql);
      return true;
  }
  //insert notification
  public function notification($uid,$type,$message)
  {
      $sql="INSERT INTO notification(uid,type,message)VALUES('$uid','$type','$message')";
      $query=$this->db->query($sql);
      return true;
  }
  //fetch notification 
  public function fetchNotification($uid)
  {
      $sql="SELECT * FROM notification WHERE uid='$uid'";
      $query=$this->db->query($sql);
      return $query;
  }
 //remove notification
  public function removenotification($id)
  {
    $sql="DELETE FROM notification WHERE id='$id' AND type='user'";
    $query=$this->db->query($sql);
    return true;
  }
//
}

//  $dd=new Auth();
//  $dd->register('mm','dd','dddd');
// print_r($dd->user_exist('b'));