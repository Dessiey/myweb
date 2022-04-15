<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                
                'title'      => 'certificate_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'certificate_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'certificate_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'certificate_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'certificate_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'facility_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'facility_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'facility_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'facility_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'facility_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
        
            [
                
                'title'      => 'team_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'team_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'team_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'team_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'team_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'item_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'item_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'item_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'item_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'item_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'application_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'application_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'application_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'application_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'application_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'evaluation_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'evaluation_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'evaluation_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'evaluation_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'evaluation_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                'title'      => 'slide_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
               [
        
                'title'      => 'slide_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
               [
        
                'title'      => 'slide_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
            //    [
        
            //     'title'      => 'slide_show',
            //     'created_at' => '2021-09-19 12:14:15',
            //     'updated_at' => '2021-09-19 12:14:15',
            //    ],
               [
        
                'title'      => 'slide_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
               [
        
                'title'      => 'settings_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
               [
        
                'title'      => 'digitize_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
               [
        
                'title'      => 'user_manual_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
            [
        
                'title'      => 'activitytrace_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
               ],
           
               

            [
             
                'title'      => 'user_management_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'permission_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'permission_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
              
                'title'      => 'permission_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'permission_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
             
                'title'      => 'permission_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
            
                'title'      => 'role_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'role_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'role_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'role_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'role_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'user_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
               
                'title'      => 'user_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'user_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'user_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'user_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                
                'title'      => 'service_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '18',
                'title'      => 'service_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '19',
                'title'      => 'service_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '20',
                'title'      => 'service_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '21',
                'title'      => 'service_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
           
           
            [
                // 'id'         => '42',
                'title'      => 'supporter_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '43',
                'title'      => 'supporter_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '44',
                'title'      => 'supporter_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '45',
                'title'      => 'supporter_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '46',
                'title'      => 'supporter_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '46',
                'title'      => 'supporter_print',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
          

            [
                // 'id'         => '37',
                'title'      => 'about_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '38',
                'title'      => 'about_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '39',
                'title'      => 'about_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '40',
                'title'      => 'about_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '41',
                'title'      => 'about_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '37',
                'title'      => 'publication_create',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '38',
                'title'      => 'publication_edit',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '39',
                'title'      => 'publication_show',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '40',
                'title'      => 'publication_delete',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
            [
                // 'id'         => '41',
                'title'      => 'publication_access',
                'created_at' => '2021-09-19 12:14:15',
                'updated_at' => '2021-09-19 12:14:15',
            ],
        ];

        Permission::insert($permissions);
    }
}
