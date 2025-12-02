#!/bin/bash
# fake_scale.sh - simulate a digital scale sending serial data

PORT="/dev/tnt0"

# Make sure PORT is writable
if [ ! -w "$PORT" ]; then
    echo "Error: Cannot write to $PORT. Try sudo or fix permissions."
    exit 1
fi

while true; do
    # Simulate weight between 0 and 100 kg with 2 decimal points
    WEIGHT=$(echo "scale=2; $RANDOM/327 + 0" | bc)

    # Randomly choose stable or unstable
    if [ $((RANDOM % 10)) -lt 8 ]; then
        STATUS="ST"  # 80% chance stable
    else
        STATUS="US"  # 20% chance unstable
    fi

    # Format weight: +000.00 kg (fixed width)
    WEIGHT_FORMATTED=$(printf "%+06.2f" "$WEIGHT")

    # Build the serial line like a real scale: ST,+012.34 kg\r\n
    LINE="${STATUS},${WEIGHT_FORMATTED} kg\r\n"

    # Send to virtual serial port
    printf "$LINE" > "$PORT"

    # Wait 1 second before next reading
    sleep 1
done

