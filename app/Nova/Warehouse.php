<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Laravel\Nova\Fields\BelongsTo;

class Warehouse extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Warehouse';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('warehouse_id')->sortable(),
            Text::make('Name')->rules('required', 'max:255'),
              /*
            BelongsTo::make('Company'),
            BelongsTo::make('Department'),
            */

            NovaBelongsToDepend::make('Company')
                ->options(\App\Company::all()),
            NovaBelongsToDepend::make('DepartMent')
                ->optionsResolve(function ($company) {
                    return $company->departments()->get(['department_id', 'name']);
                })
                ->dependsOn('Company'),
            NovaBelongsToDepend::make('Location')
                ->optionsResolve(function ($department) {
                    return $department->locations()->get(['location_id', 'name']);
                })
                ->dependsOn('DepartMent'),
            ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
