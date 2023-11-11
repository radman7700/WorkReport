<?php

namespace Pishgaman\WorkReport\Controllers\api;

use Illuminate\Http\Request;
use Pishgaman\Pishgaman\Repositories\LogRepository;
use Pishgaman\Pishgaman\Middleware\CheckMenuAccess;
use Pishgaman\WorkReport\Database\Repository\WorkReportRepository;
use App\Http\Controllers\Controller;

class WorkReportController extends Controller
{
    private $validActions = [
        'getWorkList',
        'saveNewWorkReport',
        'deleteWorkReport',
        'updateWorkReport'
    ];

    protected $validMethods = [
        'GET' => ['getWorkList'], // Added 'createAccessLevel' as a valid method-action pair
        'POST' => ['saveNewWorkReport'], // Added 'createAccessLevel' as a valid action for POST method
        'PUT' => ['updateWorkReport'],
        'DELETE' => ['deleteWorkReport']
    ];

    protected $user;
    protected $logRepository;
    protected $WorkReportRepository;
    public function __construct(logRepository $logRepository,WorkReportRepository $WorkReportRepository)
    {
        $this->logRepository = $logRepository;
        $this->WorkReportRepository = $WorkReportRepository;
        $this->middleware(CheckMenuAccess::class);
        $this->user = auth()->user();
    }

    public function action(Request $request)
    {
        if ($request->has('action')) {
            $functionName = $request->action;
            $method = $request->method();
            // Log::error('method: ' . $method);
            // Log::error('functionName: ' . $functionName);

            if ($this->isValidAction($functionName, $method)) {
                return $this->$functionName($request);
            } else {
                return response()->json(['errors' => 'requestNotAllowed'], 422);
            }
        }

        return abort(404);
    }

    private function isValidAction($functionName, $method)
    {
        return in_array($functionName, $this->validActions) && in_array($functionName, $this->validMethods[$method]);
    }

    public function updateWorkReport(Request $request)
    {
        // اجازه یا مجاز بودن عملیات ویرایش را بررسی کنید

        $data = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'description' => 'nullable|string',
            'outcome' => 'nullable|string',
            'project_task' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        $WorkReportId = $request->WorkReportId;

        $updatedWorkReport = $this->WorkReportRepository->update($WorkReportId, $data);

        // ممکن است نیاز به ارسال پاسخ 200 OK یا هر پاسخ دیگری باشد
        return response()->json(['message' => 'Work Report updated successfully', 'data' => $updatedWorkReport]);
    }

    public function deleteWorkReport(Request $request)
    {
        if (!$this->isValidAction('deleteWorkReport', 'DELETE')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $workReportId = $request->id ?? 0;

        $this->WorkReportRepository->delete($workReportId);

        // ممکن است نیاز به ارسال پاسخ 200 OK یا هر پاسخ دیگری باشد
        return response()->json(['message' => 'Work Report deleted successfully']);
    }

    public function saveNewWorkReport($request)
    {
        if (!$this->isValidAction('saveNewWorkReport', 'POST')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }        

            // تنظیم مقدار employee_id از کاربر فعلی
            $employee_id = auth()->user()->id;

            // اعتبارسنجی داده‌های فرم
            $validatedData = $request->validate([
                'date'          => 'required|date',
                'start_time'    => 'nullable|date_format:H:i',
                'end_time'      => [
                    'nullable',
                    'date_format:H:i',
                    // 'after_or_equal:start_time',
                ],
                'description'   => 'required|string',
                'outcome'       => 'nullable|string',
                'project_task'  => 'required|string',
                'location'      => 'nullable|string',
            ]);

            // تنظیم مقدار employee_id در آرایه validatedData
            $validatedData['employee_id'] = $employee_id;

            // ایجاد یک مورد جدید با استفاده از ریپازیتوری
            $this->WorkReportRepository->create($validatedData);

            return response()->json('Success', 200);   
    }

    public function getWorkList($request)
    {
        if (!$this->isValidAction('getWorkList', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $employee_id = auth()->user()->id;

        $options = [
            'page' => $request->page ?? 1,
            'sortings' => [
                [
                    'column' => 'date',
                    'order' => 'desc',
                ],
            ],
            'with' => ['employee:username,id'],
            'conditions' => [
                [
                    'column' => 'employee_id',
                    'operator' => '=',
                    'value' => $employee_id,
                ],
                // می‌توانید شرایط دیگر را نیز اضافه کنید
            ],
        ];       
        
        $WorkList = $this->WorkReportRepository->Get($options,30);        

        return response()->json(['WorkList' => $WorkList], 200);

    }
}
