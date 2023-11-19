<?php 

namespace Pishgaman\WorkReport\Database\Repository;

use Pishgaman\WorkReport\Database\Models\WorkReport;
use Illuminate\Support\Facades\DB;

class WorkReportRepository
{
    public function Get(array $options, $perPage = 10)
    {
        $query = WorkReport::query();
    
        // اضافه کردن 'orderby' اختیاری
        if (isset($options['sortings']) && is_array($options['sortings'])) {
            foreach ($options['sortings'] as $sorting) {
                if (isset($sorting['column'])) {
                    $order = isset($sorting['order']) && strtolower($sorting['order']) === 'desc' ? 'desc' : 'asc';
                    $query->orderBy($sorting['column'], $order);
                }
            }
        }
    
        // اضافه کردن 'groupby' اختیاری
        if (isset($options['groupby'])) {
            $query->groupBy($options['groupby']);
        }
    
        // اضافه کردن شروط اضافی اختیاری
        if (isset($options['conditions']) && is_array($options['conditions'])) {
            foreach ($options['conditions'] as $condition) {
                if (isset($condition['column']) && isset($condition['operator']) && isset($condition['value'])) {
                    // افزودن شرط به تابع
                    if ($condition['operator'] === 'between' && is_array($condition['value'])) {
                        $query->whereBetween($condition['column'], $condition['value']);
                    } else {
                        $query->where($condition['column'], $condition['operator'], $condition['value']);
                    }
                }
            }
        }
    
        // اضافه کردن مشخصات برای select
        if (isset($options['select']) && is_array($options['select'])) {
            $query->select($options['select']);
        }

        $sum = isset($options['sum']) && is_array($options['sum']) ? $options['sum'] : false;

        if ($sum) {
            foreach ($sum as $sumOption) {
                if (isset($sumOption['column'])) {
                    $query->addSelect(DB::raw("SUM({$sumOption['column']}) as {$sumOption['alias']}"));
                }
            }
        }

        // اضافه کردن شمارش رکوردها
        $count = isset($options['count']) && $options['count'] ? true : false;
    
        if ($count) {
            return $query->count();
        }
        
        $get = isset($options['get']) && $options['get'] ? true : false;

        if (isset($options['with']) && is_array($options['with'])) {
            $query->with($options['with']);
        }

        if ($get) {
            return $query->get();
        }

        // اضافه کردن صفحه‌بندی
        $page = isset($options['page']) ? $options['page'] : 1;
        return $query->paginate($perPage, ['*'], 'page', (int) $page);
    }  

    public function find($id)
    {
        return WorkReport::find($id);
    }

    public function create(array $data)
    {
        return WorkReport::create($data);
    }

    public function update($workReportId, array $data)
    {
        $workReport = WorkReport::findOrFail($workReportId);
        $workReport->update($data);

        return $workReport;
    }

    public function delete($workReportId)
    {
        return WorkReport::findOrFail($workReportId)->delete();
    }
}
