<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrivacyPolicyFormRequest;
use App\Interfaces\Repositories\PrivacyPolicyRepositoryInterface;

class PrivacyPolicyController extends Controller
{
    public $page = 'privacy_policy';
    private PrivacyPolicyRepositoryInterface $privacyPolicyRepository;

    public function __construct(PrivacyPolicyRepositoryInterface $privacyPolicyRepository)
    {
        $this->privacyPolicyRepository = $privacyPolicyRepository;
    }

    public function index()
    {
        $page           = $this->page;
        $privacy_policy = $this->privacyPolicyRepository->getPrivacyPolicyIndex();

        return view('admin.privacy-policy.edit', compact('privacy_policy', 'page'));
    }

    public function update(PrivacyPolicyFormRequest $request)
    {
        $this->privacyPolicyRepository->savePrivacyPolicyData($request);

        return redirect()->back()->with('flash_message', 'Privacy Policy updated!');
    }
}
