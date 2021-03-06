#include <stdio.h>
#include <mpi.h>
#include <unistd.h>

char All[4840];
int ThisTask;
int NTask;

int main(int argc, char **argv)
{
  int task;
  int nothing;
  MPI_Status status;

  int errorFlag = 0;
  int sysstatus;

  MPI_Init(&argc, &argv);
  MPI_Comm_rank(MPI_COMM_WORLD, &ThisTask);
  MPI_Comm_size(MPI_COMM_WORLD, &NTask);
#if 1
  if(ThisTask == 0) {
      printf("Task %d cmd run\n", ThisTask);
      sysstatus = system(
        "cp test.dat test2.dat");
      printf("Task %d cmd status %d\n", ThisTask, sysstatus);
  }
#else
  if (ThisTask == 0) {
     sleep(60);
  }
#endif

  if (ThisTask == 0) {
    printf("Task 0 Wait Loop START\n");
    for (task = 1; task < NTask; task++) {
       printf("Task %d Recv START\n", task);
       MPI_Recv(&nothing, sizeof(nothing), MPI_BYTE, task, 0, MPI_COMM_WORLD, 
                &status);
       printf("Task %d Recv END\n", task);
    }
    printf("Task 0 Wait Loop END\n");
  }
  else {
    printf("Task %d Send START\n", ThisTask);
    MPI_Send(&nothing, sizeof(nothing), MPI_BYTE, 0, 0, MPI_COMM_WORLD);
    printf("Task %d Send END\n", ThisTask);
  }

  printf("Task %d Finalize START\n", ThisTask);
  MPI_Finalize();		/* clean up & finalize MPI */
  printf("Task %d Finalize END\n", ThisTask);

  return 0;
}

