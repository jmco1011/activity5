<!DOCTYPE html>
<html>
<head>
    <title>Activity 5</title>
</head>
<body>
<div id = "app">
        Section:
        <select name = "" id = "" v-on:change = "fetchStudent()" 
        v-model = "selected_section">
            @foreach($sections as $section)
            <option value = "{{ $section->id }}">{{$section->name}}
                
            </option>
            @endforeach
        </select>
        <br/>
        Student:
        <ul>
            <li v-for="students in paidStudents">@{{students.first_name}}</li>
        </ul>
        Unpaid:
        <ul>
            <li v-for="students in unpaidStudents">@{{students.first_name}}</li>
        </ul>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script >
        var vn = new Vue({
            el: '#app',
            data:{
                selected_section:'',
                students:[],
            },
            methods:{
                fetchStudent(){
                    axios.get('/students?section_id='+this.selected_section).then(({data})=>{console.log(data);

                });
            }
        },
        mounted(){
            axios.get('/students').then(({data})=>{console.log(data)
            });
        },
        computed:{
            paidStudents(){
                return this.students.filter(function(student){
                        return student.date_paid != null;
                });
            },
            unpaidStudents(){
                return this.studens.filter(function(student){
                    return student.date_paid == null;
                });
            }
        }

        })
</script>
</html>