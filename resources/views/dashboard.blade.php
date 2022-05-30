<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ToDo List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">




                  <div class="panel-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Похоже, что-то пошло не так</strong>

                      <br><br>

                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                          <!-- New Task Form -->
                          <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                              {{ csrf_field() }}

                              <!-- Task Name -->
                              <div class="form-group">
                                  <label for="task-name" class="col-sm-3 control-label">Задача</label>

                                  <div class="col-sm-6">
                                      <input type="text" name="name" id="task-name" class="form-control">
                                  </div>
                              </div>

                              <!-- Add Task Button -->
                              <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-6">
                                      <button type="submit" class="btn btn-success">
                                          <i class="fa fa-plus"></i> Добавить
                                      </button>
                                  </div>
                              </div>
                            </form>





                  @foreach(auth()->user()->tasks as $task)
                  <tr class="border-b hover:bg-orange-100">
                        <form>
                            {{$task->name}}
                            <button type="submit" name="delete" formmethod="delete" formaction="/task/{{$task->id}}">Delete</button>
                            {{ csrf_field() }}
                        </form>
                    </tr>
                  @endforeach



                      </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
