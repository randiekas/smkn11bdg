<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('test_method'))
{
  /**
   * function for check leveling when access url applications
   *
   * @param  level_id  $level_id
   * @param  url  url
   * @return Response TRUE FALSE
   */
    function check_level($level_id,$url)
    {
      $json = '[{"level_id":"1","url":"customers\/","slug":"customers\/"},{"level_id":"1","url":"cash_bank_masuk\/","slug":"cash_bank_masuk\/"},{"level_id":"1","url":"open_cashier\/","slug":"open_cashier\/"},{"level_id":"1","url":"chart_of_account\/","slug":"chart_of_account\/"},{"level_id":"1","url":"journal\/","slug":"journal\/"},{"level_id":"1","url":"endofmonth\/","slug":"endofmonth\/"},{"level_id":"1","url":"journal_detail\/","slug":"journal_detail\/"},{"level_id":"1","url":"buku_besar\/","slug":"buku_besar\/"},{"level_id":"1","url":"worksheet\/","slug":"worksheet\/"},{"level_id":"1","url":"neraca_lajur\/laba_rugi\/","slug":"neraca_lajur\/laba_rugi\/"},{"level_id":"1","url":"neraca_lajur\/report\/","slug":"neraca_lajur\/report\/"},{"level_id":"1","url":"pengajuanbiaya\/","slug":"pengajuanbiaya\/"},{"level_id":"1","url":"verifikasi_pengajuan\/","slug":"verifikasi_pengajuan\/"},{"level_id":"1","url":"penyusunan_anggaran\/","slug":"penyusunan_anggaran\/"},{"level_id":"1","url":"kodeorganisasi\/","slug":"kodeorganisasi\/"},{"level_id":"1","url":"kodekegiatan\/","slug":"kodekegiatan\/"},{"level_id":"1","url":"sumberdana\/","slug":"sumberdana\/"},{"level_id":"1","url":"c_module\/","slug":"c_module\/"},{"level_id":"1","url":"c_module_group\/","slug":"c_module_group\/"},{"level_id":"1","url":"module_level\/","slug":"module_level\/"},{"level_id":"1","url":"fixed_assets\/","slug":"fixed_assets\/"},{"level_id":"1","url":"fixed_assets_management\/","slug":"fixed_assets_management\/"},{"level_id":"1","url":"draft_journal\/","slug":"draft_journal\/"},{"level_id":"1","url":"neraca_lajur\/","slug":"neraca_lajur\/"},{"level_id":"1","url":"manage_user\/","slug":"manage_user\/"},{"level_id":"1","url":"cash_bank_keluar\/","slug":"cash_bank_keluar\/"},{"level_id":"1","url":"contract\/","slug":"contract\/"},{"level_id":"1","url":"arcard\/","slug":"arcard\/"},{"level_id":"1","url":"purchase_order\/","slug":"purchase_order\/"},{"level_id":"1","url":"purchase_requisition\/","slug":"purchase_requisition\/"},{"level_id":"1","url":"customers\/","slug":"customers\/"},{"level_id":"1","url":"close_cashier\/","slug":"close_cashier\/"},{"level_id":"1","url":"cashier_preview\/","slug":"cashier_preview\/"},{"level_id":"2","url":"journal\/","slug":"journal\/"},{"level_id":"2","url":"draft_journal\/","slug":"draft_journal\/"},{"level_id":"16","url":"customers\/","slug":"customers\/"},{"level_id":"1","url":"billing\/","slug":"billing\/"},{"level_id":"1","url":"customers\/","slug":"customers\/"},{"level_id":"1","url":"engine\/","slug":"engine\/"},{"level_id":"1","url":"engine\/","slug":"engine\/"},{"level_id":null,"url":"atm\/","slug":"atm\/"},{"level_id":"1","url":"atm\/","slug":"atm\/"},{"level_id":"1","url":"billing_va\/","slug":"billing_va\/"},{"level_id":"1","url":"arcard\/","slug":"arcard\/"}]';
      $gate = json_decode($json,TRUE);
      foreach($gate as $row)
      {
        if($row["slug"]==$url && $row["level_id"]==$level_id)
        {
          return TRUE;
        }
      }
      return FALSE;
    }
    function get_routes()
    {
      $route['Module_Settings/decodeKey'] = 'errors_page_handling/not_found';
      return $route;
    }
    function get_menu($level_id,$id,$sub=FALSE)
    {
      $menus = array();
      $json = read_file("application/config/keys.json");
  		$json = json_decode($json,TRUE);
      if($sub==FALSE)
      {
      for($x=0;$x<count($json);$x++)
      {
          if($json[$x]["level_id"]==$level_id && $json[$x]["module"]===TRUE && $json[$x]["parent_id"]==$id)
          {
              $menu = array();
              $menu["id"] = $json[$x]["id"];
              $menu["parent_id"] = $json[$x]["parent_id"];
              $menu["name"] = $json[$x]["name"];
              $menu["url"] = $json[$x]["url"];
              $menu["slug"] = $json[$x]["slug"];
              $menu["icon"] = $json[$x]["icon"];
              $menu["sub_module"] = get_sub_module($json,$json[$x]["id"]);
              $menus[] =  $menu;
          }
      }
      }
      else{
        for($x=0;$x<count($json);$x++)
        {
            if($json[$x]["level_id"]==$level_id && $json[$x]["module"]===TRUE && $json[$x]["parent_id"]==$id)
            {
                $menu = array();
                $menu["id"] = $json[$x]["id"];
                $menu["parent_id"] = $json[$x]["parent_id"];
                $menu["name"] = $json[$x]["name"];
                $menu["url"] = $json[$x]["url"];
                $menu["slug"] = $json[$x]["slug"];
                $menu["icon"] = $json[$x]["icon"];
                $menus[] =  $menu;
            }
        }
      }
      return $menus;
    }
    function get_sub_module($json,$id)
    {
      $menus = array();
      for($x=0;$x<count($json);$x++)
      {
        if($json[$x]["module"]===TRUE && $json[$x]["parent_id"]==$id)
        {
            $menu = array();
            $menu["name"] = $json[$x]["name"];
            $menu["url"] = $json[$x]["url"];
            $menu["slug"] = $json[$x]["slug"];
            $menu["icon"] = $json[$x]["icon"];
            $menus[] =  $menu;
        }
      }
      return $menus;
    }
    function getAccessMenu()
    {
      $level_id = $_SESSION["level_id"];
      $accessMenu = array();
      $json = read_file("application/config/keys.json");
  		$json = json_decode($json,TRUE);
  		for($x=0;$x<count($json);$x++)
      {
        if($json[$x]["level_id"]==$level_id && $json[$x]["module"]===TRUE)
        {
          $access = array();
          $access["id"] = $json[$x]["id"];
          $access["label"] = $json[$x]["name"];
          $access["icon"] = base_url("assets/jqwidgets/".$json[$x]["icon"]);
          $access["parentid"] = $json[$x]["parent_id"];
          $access["slug"] = ($json[$x]["module_type"]=="folder")?FALSE:$json[$x]["slug"];
          $accessMenu[] = $access;
        }
      }
      return $accessMenu;
    }
    function getGroupModulAll($level_id)
    {
      $menus = array();
      $group_menu = array();
      $group = array();
      $json = read_file("application/config/keys.json");
  		$json = json_decode($json,TRUE);



  		for($x=0;$x<count($json);$x++)
      {
        if($json[$x]["level_id"]==$level_id && $json[$x]["module"]===TRUE)
        {
          if($json[$x]["parent_id"]==0)
          {
            $group_menu[] = $json[$x]["parent_id"];
            $group[] = $json[$x];
          }
        }
      }
      return $group;
    }
    function getGroupID($slug)
    {
      $group_menu = array();
      $group = array();
      $json_group_menu = json_decode(read_file("application/config/keys.json"),TRUE);

      for($y=0;$y<count($json_group_menu);$y++)
      {
        if($json_group_menu[$y]["slug"]==$slug."/")
        {
            return $json_group_menu[$y]["id"];
        }
      }
      return FALSE;
    }
    function getGroup($url)
    {
      $group_menu = array();
      $group = array();
      $json_group_menu = json_decode(read_file("application/config/keys_group.json"),TRUE);
      $group_menu = array();
      for($y=0;$y<count($json_group_menu);$y++)
      {
        if($json_group_menu[$y]["url"]==$url)
        {
            $group_menu = $json_group_menu[$y];
        }
      }
      return $group_menu;
    }

    function allow_update($slug)
    {
      $level_id = $_SESSION["level_id"];
      $json = read_file("application/config/keys.json");
      $json = json_decode($json,TRUE);
      for($x=0;$x<count($json);$x++)
      {
        if($json[$x]["level_id"]==$level_id && $json[$x]["module"]===TRUE && $json[$x]["slug"]==$slug && $json[$x]["update"]=="yes")
        {
          return TRUE;
        }
      }
      return FALSE;
    }
}
