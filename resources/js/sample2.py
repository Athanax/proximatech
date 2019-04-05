#!/usr/bin/env python
# File name: while.twpy
number = 23
running = True
while running:
    guess = int(raw_input('Enter an integer : '))

    if guess == number:
        print 'Congratulations, you guessed it.'
        running = False # this causes the while loop to stop
    elif guess < number:
        print 'No, it is higher than that.'
    else:
        print 'No, it is lower than that.'
else:
    print 'The while loop is over'
print 'Done'