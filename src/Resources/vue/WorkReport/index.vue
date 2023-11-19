<template>

    <div class="row">
        <div class="col-sm-12">
            <div class="tasks-container">
                <div class="row gutters">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="stats-detail">
                                <h3>{{ allCount }} / {{ userCount }}</h3>
                                <p>فعالیت مجموعه / فعالیت شما</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-percent"></i></div>
                            <div class="stats-detail">
                                <h3>{{ projectPercent }} / {{ totalScore }}</h3>
                                <p>درصد فعالیت شما / امتیاز شما</p>
                            </div>
                        </div>
                    </div>  
 
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-users"></i></div>
                            <div class="stats-detail">
                                <h3>{{ findingPeople }}</h3>
                                <p>سوژه‌یابی</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ Documentation }}</h3>
                                <p>مستندسازی</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ writeBulltan }}</h3>
                                <p>ارسال خبرنامه (بولتن)</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ sendNews }}</h3>
                                <p>ارسال خبر</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ sendNewspaper }}</h3>
                                <p>ارسال بصر</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ programDevelop }}</h3>
                                <p>برنامه نویسی</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ teaching }}</h3>
                                <p>آموزش</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-6">
                        <div class="info-tiles">
                            <div class="info-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-detail">
                                <h3>{{ other }}</h3>
                                <p>سایر</p>
                            </div>
                        </div>
                    </div>                                                                                                                                                                                                                         
                </div>
                <div class="modal fade" id="addNewTask" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl" role="document">
						<div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addNewTaskLabel">ایجاد گزارش کار</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="date= '';start_time='';end_time='';description='';outcome='';project_task=''">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="project_task">پروژه <i>*</i></label>
                                            <select class="form-select" v-model="project_task" aria-label="Default select example">
                                                <option value="سوژه‌یابی">سوژه‌یابی</option>
                                                <option value="مستندسازی">مستندسازی</option>
                                                <option value="ارسال خبرنامه">ارسال خبرنامه (بولتن)</option>
                                                <option value="ارسال خبر">ارسال خبر</option>
                                                <option value="ارسال بصر">ارسال بصر</option>
                                                <option value="برنامه نویسی">برنامه نویسی</option>                                                
                                                <option value="آموزش">آموزش</option>                                                
                                                <option value="سایر">سایر</option>
                                            </select>
                                        </div>
                                    </div>                                     
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="date">تاریخ <i>*</i></label>
                                            <date-picker v-model="date"></date-picker>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="start_time">زمان شروع</label>
                                            <input type="time" class="form-control" id="start_time" v-model="start_time">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="end_time">زمان پایان</label>
                                            <input type="time" class="form-control" id="end_time" v-model="end_time" >
                                        </div>                                                                       
                                    </div>                                                                       
                                    <div class="col-sm-12 col-md-12">                                
                                        <div class="form-group">
                                            <label for="description">توضیحات <i>*</i></label>
                                            <textarea class="form-control" id="description" v-model="description" style="min-height:150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">  
                                        <div class="form-group">
                                            <label for="outcome">تعداد</label>
                                            <input v-if="selectedOption != 'ارسال خبرنامه'" class="form-control" id="outcome" v-model="outcome">
                                            <select class="form-select" v-else v-model="outcome" @change="handleOptionChange" aria-label="Default select example">
                                                <option v-for="item in Newsletter" :value="item.type">{{item.type}}</option>
                                            </select>                                             
                                        </div>
                                    </div>                                                                                          
                                </div>                                                          
                            </div>
                            <div class="modal-footer custom">
                                <div class="left-side">
                                    <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">لغو</button>
                                </div>
                                <div class="divider"></div>
                                <div class="right-side">
                                    <button type="button" @click="saveNewWorkReport()" class="btn btn-link success btn-block">ایجاد</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="modal fade" id="editNewTask" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addNewTaskLabel">ویرایش گزارش کار</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="project_task">پروژه <i>*</i></label>
                                            <select class="form-select" v-model="edit_project_task" aria-label="Default select example">
                                                <option value="سوژه‌یابی">سوژه‌یابی</option>
                                                <option value="مستندسازی">مستندسازی</option>
                                                <option value="ارسال خبرنامه">ارسال خبرنامه (بولتن)</option>
                                                <option value="ارسال خبر">ارسال خبر</option>
                                                <option value="ارسال بصر">ارسال بصر</option>
                                                <option value="برنامه نویسی">برنامه نویسی</option>
                                                <option value="آموزش">آموزش</option>                                                
                                                <option value="سایر">سایر</option>
                                            </select>
                                        </div>
                                    </div>                                     
                                    <div class="col-sm-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="edit_date">تاریخ <i>*</i></label>
                                            <date-picker v-model="edit_date"></date-picker>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="edit_start_time">زمان شروع</label>
                                            <input type="time" class="form-control" id="edit_start_time" v-model="edit_start_time">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="edit_end_time">زمان پایان</label>
                                            <input type="time" class="form-control" id="edit_end_time" v-model="edit_end_time" >
                                        </div>                                                                       
                                    </div>                                                                      
                                    <div class="col-sm-12 col-md-12">                                
                                        <div class="form-group">
                                            <label for="edit_description">توضیحات <i>*</i></label>
                                            <textarea class="form-control" id="edit_description" v-model="edit_description" style="min-height:150px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">  
                                        <div class="form-group">
                                            <label for="edit_outcome">تعداد</label>
                                            <input class="form-control"  v-if="selectedOption != 'ارسال خبرنامه'" id="edit_outcome" v-model="edit_outcome">
                                            <select class="form-select" v-else v-model="edit_outcome" @change="handleOptionChange" aria-label="Default select example">
                                                <option v-for="item in Newsletter" :value="item.type">{{item.type}}</option>
                                            </select>                                             
                                        </div>
                                    </div>                                                                                          
                                </div>                                                          
                            </div>
                            <div class="modal-footer custom">
                                <div class="left-side">
                                    <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">لغو</button>
                                </div>
                                <div class="divider"></div>
                                <div class="right-side">
                                    <button type="button" @click="saveEditWorkReport()" class="btn btn-link success btn-block">ویرایش</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                       
                <div class="tasks-header row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-6">
                        <div class="form-group">  
                            <h3>از: </h3> <date-picker v-model="date_start"></date-picker>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-6">
                        <div class="form-group">  
                            <h3>تا: </h3> <date-picker v-model="date_end"></date-picker>
                        </div>
                    </div>                                                  
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-6">
                        <div class="form-group">                    
                            <h3>پروژه:</h3>
                            <select class="form-select" aria-label="Default select example" v-model="project_task_search">
                                <option value=""></option>
                                <option value="سوژه‌یابی">سوژه‌یابی</option>
                                <option value="مستندسازی">مستندسازی</option>
                                <option value="ارسال خبرنامه">ارسال خبرنامه (بولتن)</option>
                                <option value="ارسال خبر">ارسال خبر</option>
                                <option value="ارسال بصر">ارسال بصر</option>
                                <option value="برنامه نویسی">برنامه نویسی</option>
                                <option value="آموزش">آموزش</option>                                                
                                <option value="سایر">سایر</option>
                            </select>  
                        </div>
                    </div>                  
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-6">
                        <div class="form-group"> 
                            <h3>ابزار</h3>
                            <button class="btn btn-info btn-lg" @click="runNewGet()" title="اعمال فیلتر"><i class="fa fa-search"></i></button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addNewTask" title="افزودن گزارش کار"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>   
				</div>
            </div>
                        
            <div class="timeline">
                <div class="timeline-row" v-for="item in WorkList">
                    <div class="timeline-time">
                        {{item.employee.username}} - {{convertDateToPersian(item.date)}}
                        <button class="btn btn-danger btn-sm" @click="deleteWorkReport(item.id)"><i class="fa fa-trash"></i></button>
                        <button class="btn btn-info btn-sm" @click="WorkReportId = item.id;edit_date= convertDateToPersian(item.date);
            edit_employee_id = item.employee_id
            edit_start_time=item.start_time;           
            edit_end_time=item.end_time;
            edit_description=item.description;
            edit_outcome=item.outcome;
            edit_project_task=item.project_task;
            selectedOption = isValueInArray(item.project_task);
            edit_location=item.location;" data-toggle="modal" data-target="#editNewTask"><i class="fa fa-edit"></i></button>
                    </div>
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <h4>{{item.project_task}}</h4>
                        <p>{{item.description}}</p>
                        <div class="">
                            <span class="badge badge-pill">
                            </span>
                            <span class="badge badge-pill">{{item.start_time}} - {{item.end_time}}</span>
                        </div>                        
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-sm-12">
            <nav aria-label="Page navigation" v-if="pagination.last_page != 1">
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous" class="page-link" @click.prevent="changePage(pagination.current_page - 1,orderbyValue)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                        :class="[ page == isActived ? 'page-item active' : '']">
                        <a href="#" @click.prevent="changePage(page,orderbyValue)" class="page-link">{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next" class="page-link"
                            @click.prevent="changePage(pagination.current_page + 1,orderbyValue)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>        
    </div>


</template>

<script>
import Swal from 'sweetalert2';
import jalaliMoment from "jalali-moment";

export default {
    data() {
        return {
            WorkList:[],
            Newsletter:[],
            WorkReportId:'',
            date: '', 
            start_time:'',           
            end_time:'',  
            description:'',
            outcome:'',         
            project_task:'',   
            location:'',  
            edit_date: '', 
            edit_start_time:'',           
            edit_end_time:'',  
            edit_description:'',
            edit_outcome:'',         
            edit_project_task:'',   
            edit_location:'', 
            edit_employee_id:'',  
            selectedOption:'',            
            pagination: {
                total: 0,
                per_page: 2,
                from: 1,
                to: 0,
                current_page: 1,
                last_page: 1
            },
            offset:4,
            itemsPerPage:20, 
            allCount: 0,
            userCount: 0,
            projectPercent:0,
            findingPeople:0,
            Documentation:0,
            writeBulltan:0,
            sendNews:0,
            sendNewspaper:0,
            programDevelop:0,
            teaching:0,
            other:0,  
            totalScore:0,   
            isReadOnly:'readonly', 
            date_start:'',  
            date_end:'',
            project_task_search:'' 
        }
    },
    components: {  },  
    mounted() {
        this.getWorkList();
        this.getNewsletter();
        this.getUserStatistics();
    },
    methods: {  
        runNewGet()
        {
            this.getWorkList(1);
            this.getUserStatistics();
        },
        convertDateToPersian(date){
            return jalaliMoment(date, "YYYY-MM-DD").format("jYYYY/jMM/jDD");
        },
        convertDateToMiladi(date){
            console.log(date);
            return jalaliMoment.from(input, 'fa', 'YYYY/MM/DD').locale('en').format('YYYY/MM/DD');
        },
        getUserStatistics()
        {
            axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                const token = response.data.token;
                const dateStart = this.date_start;
                const dateEnd = this.date_end;
                const project_task_search = this.project_task_search

                axios.request({
                    method: 'GET',
                    url: this.getAppUrl() + 'api/user/WorkReport?action=userStatistics&date_start='+dateStart+'&date_end='+dateEnd+'&project_task_search='+project_task_search,
                    headers: {'Authorization': `Bearer ${token}`}
                }).then(response => {
                    this.allCount = response.data.allCount;                
                    this.userCount = response.data.userCount; 
                    this.projectPercent = response.data.projectPercent              
                    this.findingPeople = response.data.findingPeople              
                    this.Documentation = response.data.Documentation  
                    this.writeBulltan = response.data.writeBulltan  
                    this.sendNews = response.data.sendNews  
                    this.sendNewspaper = response.data.sendNewspaper  
                    this.programDevelop = response.data.programDevelop  
                    this.teaching = response.data.teaching  
                    this.other = response.data.other
                    this.totalScore = response.data.totalScore
                }).catch(error => {
                    this.checkError(error);
                });
            }).catch(error => {
                this.checkError(error);
            });
        },        
        getNewsletter()
        {
            axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                const token = response.data.token;
                axios.request({
                    method: 'GET',
                    url: this.getAppUrl() + 'api/user/WorkReport?action=getNewsletter',
                    headers: {'Authorization': `Bearer ${token}`}
                }).then(response => {
                    this.Newsletter = response.data.Newsletter;                
                }).catch(error => {
                    this.checkError(error);
                });
            }).catch(error => {
                this.checkError(error);
            });
        },
        isValueInArray(value){
            var options = ["سوژه‌یابی","مستندسازی","ارسال خبرنامه","ارسال خبر","ارسال بصر","برنامه نویسی","آموزش"];
            if(options.includes(value))
            {
                return value;
            }
            else
            {
                return 6;
            }
        },
        handleOptionChange() {
            this.isReadOnly =  'readonly';
            this.project_task = this.selectedOption;
            this.edit_project_task = this.selectedOption;
        },        
        deleteWorkReport(id){
            Swal.fire({
                title: 'آیا اطمینان دارید؟',
                text: "این کاربر به صورت موقت حذف خواهد شد!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله، حذف کن!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                        const token = response.data.token;
                        const action = 'deleteWorkReport';
                        axios.request({
                            method: 'delete', // از PUT برای ویرایش استفاده می‌کنیم
                            url: this.getAppUrl() + 'api/user/WorkReport',
                            headers: {'Authorization': `Bearer ${token}`},
                            data: { action, id }
                        }).then(response => {
                            Swal.fire(
                                'حذف شد!',
                                'گزارش کار شما با موفقیت حذف شد',
                                'success'
                            );
                            this.searchQuery = '';
                            this.getWorkList(this.pagination.current_page);          
                        }).catch(error => {
                            this.checkError(error);
                        });
                    }).catch(error => {
                        this.checkError(error);
                    });
                }
            });        
        
        },
        saveEditWorkReport(){
            axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                
                const token = response.data.token;
                const WorkReportId = this.WorkReportId
                const employee_id = this.edit_employee_id;
                const date = this.edit_date
                console.log(date);
                const start_time = this.edit_start_time;
                const end_time = this.edit_end_time;
                const description = this.edit_description;
                const outcome = this.edit_outcome;
                const project_task = this.edit_project_task;
                const action = 'updateWorkReport'; 

                axios.request({
                    method: 'PUT',
                    url: this.getAppUrl() + 'api/user/WorkReport',
                    headers: {'Authorization': `Bearer ${token}`},
                    data: { WorkReportId , employee_id , date, start_time , end_time , description , outcome , project_task , action , action }
                }).then(response => {
                    Swal.fire(
                        'ویرایش شد!',
                        'گزارش کار شما با موفقیت ویرایش شد.',
                        'success'
                    );   
                    this.getWorkList(this.pagination.current_page);       
                }).catch(error => {
                    this.checkError(error);
                });        
            }).catch(error => {
                this.checkError(error);
            });        
        },
        saveNewWorkReport() {
            axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                
                const token = response.data.token;
                const date = this.date
                const start_time = this.start_time;
                const end_time = this.end_time;
                const description = this.description;
                const outcome = this.outcome;
                const project_task = this.project_task;
                const action = 'saveNewWorkReport'; 

                axios.request({
                    method: 'POST',
                    url: this.getAppUrl() + 'api/user/WorkReport',
                    headers: {'Authorization': `Bearer ${token}`},
                    data: { date, start_time , end_time , description , outcome , project_task , action , action }
                }).then(response => {
                    Swal.fire(
                        'اضافه شد!',
                        'گزارش کار شما با موفقیت اضافه شد.',
                        'success'
                    );   
                    this.getWorkList();   
                    this.getUserStatistics();
                }).catch(error => {
                    this.checkError(error);
                });        
            }).catch(error => {
                this.checkError(error);
            });
        },    
        getWorkList(page = 1) {   
            axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                const token = response.data.token;
                const dateStart = this.date_start;
                const dateEnd = this.date_end;
                const project_task_search = this.project_task_search

                axios.request({
                    method: 'GET',
                    url: this.getAppUrl() + 'api/user/WorkReport?action=getWorkList&page='+page+'&date_start='+dateStart+'&date_end='+dateEnd+'&project_task_search='+project_task_search,
                    headers: {'Authorization': `Bearer ${token}`}
                }).then(response => {
                    this.fetchPagesDetails(response.data.WorkList);        
                    this.WorkList = response.data.WorkList.data;                
                }).catch(error => {
                    this.checkError(error);
                });
            }).catch(error => {
                this.checkError(error);
            });
        },    
        fetchPagesDetails: function (page) {
            this.pagination = {
                total: page['total'],
                per_page: page['per_page'],
                from: page['from'],
                to: page['to'],
                current_page: page['current_page'],
                last_page: page['last_page'],
            };
        },
        changePage: function (page,orderbyValue) {
            this.getWorkList(page,'');
        },         
    },
    computed: {
      isActived () {
        return this.pagination.current_page;
      },
      pagesNumber () {
            if (!this.pagination.to) {
                return [];
            }
            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;     
        } 
    }    
}
</script>

<style>
.modal .modal-footer.custom .left-side, .modal .modal-footer.custom .right-side {
    width: 45%;
}
</style>
