<?php

namespace Modules\Ievent\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Ievent\Transformers\BirthdayTransformer;

// Repositories
use Modules\Ievent\Repositories\UserRepository;

//Controllers
use Modules\Iprofile\Http\Controllers\Api\FieldApiController;
use Modules\Iprofile\Http\Controllers\Api\AddressApiController;
use Modules\Iprofile\Http\Controllers\Api\SettingApiController;
use Modules\Setting\Contracts\Setting;
use Carbon\Carbon;

class BirthdayApiController extends BaseApiController
{
  private $user;
  private $field;
  private $address;
  private $setting;
  private $userRepository;
  private $fhaOld;
  private $settingAsgard;

  public function __construct(
    UserRepository $user,
    FieldApiController $field,
    AddressApiController $address,
    SettingApiController $setting,
    Setting $settingAsgard,
    UserRepository $userRepository)
  {
    parent::__construct();
    $this->user = $user;
    $this->field = $field;
    $this->address = $address;
    $this->setting = $setting;
    $this->userRepository = $userRepository;
    $this->settingAsgard = $settingAsgard;
  }

  /**
   * GET ITEMS
   *
   * @return mixed
   */
  public function index(Request $request)
  {
    try {
      //Validate permissions
      $this->validatePermission($request, 'profile.user.index');

      //Get Parameters from URL.
      $params = $this->getParamsRequest($request);

      //Add Id of users by department
      if (isset($params->filter->getUsersByDepartment))
        $params->usersByDepartment = $this->getUsersByDepartment($params);

      //Request to Repository
      $users = $this->user->getItemsBy($params);

      $users = $users->where('birthday', '>=', Carbon::now()->format('m'));

      //Response
      $response = ["data" => BirthdayTransformer::collection($users)];

      //If request pagination add meta-page
      //$params->page ? $response["meta"] = ["page" => $this->pageTransformer($users)] : false;
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    //Return response
    return response()->json($response, $status ?? 200);
  }
}
