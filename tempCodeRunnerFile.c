#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define NUM_ROOMS 5
#define MAX_STRING_LENGTH 50

char roomsAvailability[NUM_ROOMS][MAX_STRING_LENGTH];

void displayRoomAvailability() {
    system("cls");

    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m ROOMS AVAILABILITY \e[32m\xBA<<<<<\xBA\e[0m\n");
    printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m CLASS : EXECUTIVE \e[32m\xBA<<<<<\xBA\e[0m\n");

    for (int i = 0; i < NUM_ROOMS; ++i) {
        printf("\t\t\t\t\e[32m\xBA>>>>>\xBA\e[0m ROOM %d: %-10s", i + 1, roomsAvailability[i]);
        
        int remainingTime;
        if (sscanf(roomsAvailability[i], "available %d", &remainingTime) == 1) {
            printf("TIMER : %d minutes", remainingTime);
        } else {
            printf("TIMER : Not available");
        }

        printf("\e[32m\xBA<<<<<\xBA\e[0m\n");
    }
}

void fileRoomExecutive(char room[]) {
    FILE *file;
    file = fopen("room_availability.txt", "r");

    if (file == NULL) {
        perror("Error opening file");
        exit(EXIT_FAILURE);
    }

    for (int i = 0; i < NUM_ROOMS; ++i) {
        if (fgets(roomsAvailability[i], MAX_STRING_LENGTH, file) == NULL) {
            fprintf(stderr, "Error reading room availability for room %d\n", i + 1);
            exit(EXIT_FAILURE);
        }
    }

    fclose(file);

    displayRoomAvailability();
}

int main() {
    // Initialize roomsAvailability with dummy data for testing
    sprintf(roomsAvailability[0], "available 60");
    sprintf(roomsAvailability[1], "occupied 30");
    sprintf(roomsAvailability[2], "available 45");
    sprintf(roomsAvailability[3], "occupied 15");
    sprintf(roomsAvailability[4], "available 75");

    fileRoomExecutive("EXECUTIVE");

    return 0;
}
